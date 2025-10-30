<?php
namespace anteo\blankon;

use yii\web\AssetBundle;

class BlankonAsset extends AssetBundle
{
    public $sourcePath = '@vendor/anteo/yii2-blankon-asset/assets';

    public $css = [
        //'admin/css/reset.css',
//        'admin/css/custom.css',
//        'admin/css/layout.css',
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

    public $theme = 'default';

    public $demo = false;

    public function init()
    {
        parent::init();
        if (!empty($this->css)) {
            $this->css[] = ["admin/css/themes/{$this->theme}.theme.css", 'id' => 'theme'];
            $this->css[] = "admin/css/custom.css";
        }
        if ($this->demo) {
            $this->js[] = 'admin/js/demomod.js';
        }
    }

}