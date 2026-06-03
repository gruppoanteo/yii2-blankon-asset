<?php
namespace anteo\blankon;

use yii\web\AssetBundle;

/**
 * Asset bundle del template Blankon.
 *
 * Dalla 2.0.0 supporta il theming light/dark via design tokens (CSS custom
 * properties). L'attivazione è opt-in tramite la property {@see $darkMode}:
 *
 *   // backend/config/main.php
 *   'components' => [
 *       'assetManager' => [
 *           'bundles' => [
 *               anteo\blankon\BlankonAsset::class => [
 *                   'theme'    => 'blue',     // accent (resta come prima)
 *                   'darkMode' => true,        // attiva il sistema light/dark
 *               ],
 *           ],
 *       ],
 *   ],
 *
 * Quando `darkMode` è attivo vengono registrati, in ordine:
 *   1) theme/_tokens.css   nomi dei token con fallback
 *   2) theme/light.css     valori light (default `:root`)
 *   3) theme/dark.css      valori dark sotto `html[data-theme="dark"]`
 *   4) components/plugins/yii-custom.css del vendor (CSS pre-tokens, legacy)
 *   5) themes/<accent>.theme.css   accent del vendor (id="theme")
 *   6) custom.css
 *   7) theme/coverage.css  applica i token al DOM Bootstrap/Blankon comune
 *
 * Per disattivare il FOUC inserire nel `<head>` del layout, prima di tutto:
 *   <?= \anteo\blankon\BlankonAsset::renderThemeBoot() ?>
 */
class BlankonAsset extends AssetBundle
{
    public $sourcePath = '@vendor/anteo/yii2-blankon-asset/assets';

    public $css = [
        'admin/css/components.css',
        'admin/css/plugins.css',
        'admin/css/yii-custom.css',
    ];
    public $js = [
        'admin/js/appsmod.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'anteo\fontawesome\AssetBundlePro',
        'anteo\blankon\PluginAsset',
    ];

    /** Accent skin del vendor (blue, green, purple, …). Resta come 1.x. */
    public $theme = 'default';

    /** Aggiunge il JS demo del template (selettore di skin). */
    public $demo = false;

    /**
     * Abilita il sistema light/dark basato su design tokens.
     *  - false  (default, retro-compat 1.x): nessun token caricato.
     *  - true                              : tokens + light + dark + coverage.
     *  - 'light' | 'dark'                  : forza il tema (no toggle).
     *
     * @var bool|string
     */
    public $darkMode = false;

    /**
     * Logo light (path o URL). Esposto come token CSS `--bk-logo-url`.
     * @var string|null
     */
    public $logoLight;

    /**
     * Logo dark (path o URL). Esposto in `html[data-theme="dark"]`.
     * @var string|null
     */
    public $logoDark;

    public function init()
    {
        parent::init();

        if (empty($this->css)) {
            return;
        }

        if ($this->darkMode !== false) {
            // I tokens vanno PRIMA del CSS legacy per definire i nomi
            array_unshift(
                $this->css,
                'admin/css/theme/_tokens.css',
                'admin/css/theme/light.css',
                'admin/css/theme/dark.css'
            );
        }

        // Accent skin del vendor (resta com'era)
        $this->css[] = ["admin/css/themes/{$this->theme}.theme.css", 'id' => 'theme'];
        $this->css[] = 'admin/css/custom.css';

        if ($this->darkMode !== false) {
            // Coverage va dopo tutto, così vince la cascata sui colori legacy
            $this->css[] = ['admin/css/theme/coverage.css', 'id' => 'bk-coverage'];
            // Toggle JS (vendor-side, sostituisce i toggler custom dei progetti)
            $this->js[] = 'admin/js/theme-toggle.js';

            // Override logo via custom property se forniti dal consumer
            $extra = '';
            if (!empty($this->logoLight)) {
                $extra .= ':root,html[data-theme="light"]{--bk-logo-url:url("' . addslashes($this->logoLight) . '")}';
            }
            if (!empty($this->logoDark)) {
                $extra .= 'html[data-theme="dark"]{--bk-logo-url:url("' . addslashes($this->logoDark) . '")}';
            }
            if ($extra !== '') {
                \Yii::$app->view->registerCss($extra, [], 'bk-logo-tokens');
            }
        }

        if ($this->demo) {
            $this->js[] = 'admin/js/demomod.js';
        }
    }

    /**
     * Snippet inline da inserire all'INIZIO del <head>, prima di qualsiasi
     * altro asset. Legge la preferenza tema da localStorage / cookie /
     * `prefers-color-scheme` e imposta `data-theme` su <html> PRIMA del paint:
     * elimina il FOUC tipico dei toggler client-side.
     *
     * Usage nel layout main.php:
     *
     *     <head>
     *         <?= \anteo\blankon\BlankonAsset::renderThemeBoot() ?>
     *         ...
     *     </head>
     *
     * @param string $storageKey chiave usata da JS / cookie (default "theme")
     * @return string snippet `<script>…</script>` pronto da emettere
     */
    public static function renderThemeBoot($storageKey = 'theme')
    {
        $key = json_encode($storageKey);
        return <<<HTML
<script>(function(){try{
  var k={$key};
  var t=null;
  try{t=localStorage.getItem(k);}catch(e){}
  if(!t){var m=document.cookie.match(new RegExp('(?:^|; )'+k.replace(/([.*+?^=!:\${}()|\[\]\/\\\\])/g,'\\\\$1')+'=([^;]*)'));if(m)t=decodeURIComponent(m[1]);}
  if(t!=='light'&&t!=='dark'&&t!=='auto'){t='light';}
  document.documentElement.setAttribute('data-theme',t);
}catch(e){document.documentElement.setAttribute('data-theme','light');}})();</script>
HTML;
    }
}
