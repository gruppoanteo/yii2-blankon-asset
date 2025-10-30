<?php

namespace anteo\blankon\widgets;

use yii\base\Widget;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * DashwizWidget widgets.
 *  
 * @author Marco Curatitoli <marco.curatitoli@halservice.it>
 */
class Panel extends Widget
{
    /**
     * @var string widget title
     */
    public $title;
    /**
     * @var string widget subtitle
     */
    public $subtitle;
    /**
     * @var string template for header content 
     */
    public $headerTemplate = "<div class=\"pull-left\"><h3 class=\"panel-title\">{title} <small>{subtitle}</small></h3></div>{actions}";
    /**
     * @var array the HTML attributes (name-value pairs) for widget.
     * @see Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array the HTML attributes (name-value pairs) for header.
     * @see Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $headerOptions = [];
      /**
     * @var array the HTML attributes (name-value pairs) for footer.
     * @see Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $footerOptions = [];
    /**
     * @var array the HTML attributes (name-value pairs) for body.
     * @see Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $bodyOptions = [];
    /**
     * @var string body content 
     */
    public $body;
    /**
     * @var boolean
     */
    public $renderBody = true;
    /**
     * @var string header actions
     */
    public $actions;
    /**
     * @var
     */
    public $actionOptions = [];
    
//    public $collapse = true;
    
//    public $delete = true;
    
//    public $fullscreen = true;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->initOptions();
        
        $this->registerAssets();

        echo Html::beginTag('div', $this->options) . "\n";
        echo $this->renderHeader() . "\n";
        if ($this->renderBody) {
            echo $this->renderBodyBegin() . "\n";
            echo $this->body;
        }
    }
    
    /**
     * Renders widget header
     * @return string
     */
    protected function renderHeader()
    {
        $subtitle = ($this->subtitle != "") ? $this->subtitle : '';
        $actions = '';
        $itemOptions = ArrayHelper::remove($this->actionOptions, 'itemOptions', []);
        Html::addCssClass($itemOptions, ['widget' => 'btn btn-sm']);
        Html::addCssClass($this->actionOptions, ['widget' => 'pull-right']);
        
        if ($this->actions) {
            $actions[] = $this->actions;
        }
        
        if (!empty($actions)) {
            $tag = ArrayHelper::remove($this->actionOptions, 'tag', 'div');
            $actions = Html::tag($tag, implode("\n", $actions), $this->actionOptions);
        }
        
        if (!isset($this->title, $subtitle) && empty($actions)) {
            return;
        }

        $header = strtr($this->headerTemplate, [
            '{title}' => $this->title,
            '{subtitle}' => $subtitle,
            '{actions}' => $actions
        ]) . Html::tag('div', '', ['class' => 'clearfix']);

        return Html::tag('div', $header, $this->headerOptions);
    }
    
    /**
     * Starts widget body
     * @return string
     */
    protected function renderBodyBegin()
    {
        return Html::beginTag('div', $this->bodyOptions) . "\n";
    }

    /**
     * Renders widget body end
     * @return string
     */
    protected function renderBodyEnd()
    {
        return Html::endTag('div');
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        if ($this->renderBody) {
            echo $this->renderBodyEnd() . "\n";
        }
        echo Html::endTag('div') . "\n"; // widget
    }
    
    public function renderFooterBegin()
    {
        return Html::beginTag('div', $this->footerOptions) . "\n";
    }
    
    public function renderFooterEnd()
    {
        return Html::endTag('div') . "\n";
    }

    /**
     * Initializes options
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        Html::addCssClass($this->options, ['widget' => 'panel',]);
        Html::addCssClass($this->headerOptions, ['widget' => 'panel-heading']);
        Html::addCssClass($this->bodyOptions, ['widget' => 'panel-body']);
        Html::addCssClass($this->footerOptions, ['widget' => 'panel-footer']);
    }
    
    protected function registerAssets()
    {
        BootstrapAsset::register($this->getView());
    }
}
