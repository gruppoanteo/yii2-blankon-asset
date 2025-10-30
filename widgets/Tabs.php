<?php

namespace anteo\blankon\widgets;

use yii\base\InvalidConfigException;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * <?= \anteo\blankon\widgets\Tabs::widget([
 *   'panelOptions' => ['class' => 'panel-tab-double shadow'],
 *   'headerOptions' => ['class' => 'nav-border nav-border-top-success'],
 *   'items' => [
 *      ['label' => 'aaa', 'content' => '1111'],
 *      ['label' => 'bbb', 'content' => '2222'],
 *  ]
 * ]) ?> 
 *
 * <?= \anteo\blankon\widgets\Tabs::widget([
 *   'encodeLabels' => false,
 *   'panelOptions' => ['class' => 'shadow'],
 *   'items' => [
 *       ['label' => FA::icon('user') . '<span>aaa</span>', 'content' => '1111'],
 *       ['label' => FA::icon('cog') . '<span>bbbb</span>', 'content' => '2222'],
 *   ]
 * ]) ?> 
 *
 * <?= \anteo\blankon\widgets\Tabs::widget([
 *   'encodeLabels' => false,
 *   'panelOptions' => ['class' => 'shadow panel-tab-double'],
 *   'items' => [
 *       ['label' => FA::icon('user') . '<div><span class="text-strong">Step 1</span><span>ciao</span></div>', 'content' => '1111'],
 *       ['label' => FA::icon('cog') . '<div><span class="text-strong">Step 2</span><span>ciao</span></div>', 'content' => '2222'],
 *   ]
 * ]) ?> 
 * 
 * <?= \anteo\blankon\widgets\Tabs::widget([
 *   'encodeLabels' => false,
 *   'panelOptions' => [
 *       'class' => 'panel-tab-double panel-tab-vertical row no-margin mb-15 rounded shadow', 
 *       'headerOptions' => ['class' => 'col-lg-3 col-md-3 col-sm-3']
 *   ],
 *   'tabContentOptions' => ['class' => 'col-lg-9 col-md-9 col-sm-9'],
 *   'items' => [
 *       ['label' => FA::icon('user') . '<div><span class="text-strong">Step 1</span><span>ciao</span></div>', 'content' => '1111'],
 *       ['label' => FA::icon('cog') . '<div><span class="text-strong">Step 2</span><span>ciao</span></div>', 'content' => '2222'],
 *   ]
 * ]) ?> 
 * 
 * <?= \anteo\blankon\widgets\Tabs::widget([
 *   'encodeLabels' => false,
 *   'headerOptions' => ['class' => 'nav-border nav-border-left-success'],
 *   'panelOptions' => [
 *       'class' => 'panel-tab-double panel-tab-vertical row no-margin mb-15 rounded shadow', 
 *       'headerOptions' => ['class' => 'col-lg-3 col-md-3 col-sm-3']
 *   ],
 *   'tabContentOptions' => ['class' => 'col-lg-9 col-md-9 col-sm-9'],
 *   'items' => [
 *       ['label' => 'ciao', 'content' => '1111'],
 *       ['label' => 'test', 'content' => '2222'],
 *   ]
 * ]) ?> 
 */

class Tabs extends \yii\bootstrap\Tabs
{
    public $panelOptions = [];
    
    private $_panelHeaderOptions = [];
    
    public function init()
    {
        parent::init(); 
        Html::addCssClass($this->panelOptions, 'panel-tab');
        Html::addCssClass($this->tabContentOptions, 'panel-body');
        $this->_panelHeaderOptions = ArrayHelper::remove($this->panelOptions, 'headerOptions');
        $this->panelOptions['id'] = $this->id . '-panel';
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        Panel::begin([
            'renderBody' => false,
            'options' => $this->panelOptions,
        ]);
        
        echo parent::run();
        
        Panel::end();
    }
    
    /**
     * Renders tab items as specified on [[items]].
     * @return string the rendering result.
     * @throws InvalidConfigException.
     */
    protected function renderItems()
    {
        $headers = [];
        $panes = [];

        if (!$this->hasActiveTab() && !empty($this->items)) {
            $this->items[0]['active'] = true;
        }

        foreach ($this->items as $n => $item) {
            if (!ArrayHelper::remove($item, 'visible', true)) {
                continue;
            }
            if (!array_key_exists('label', $item)) {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $headerOptions = array_merge($this->headerOptions, ArrayHelper::getValue($item, 'headerOptions', []));
            $linkOptions = array_merge($this->linkOptions, ArrayHelper::getValue($item, 'linkOptions', []));

            if (isset($item['items'])) {
                $label .= ' <b class="caret"></b>';
                Html::addCssClass($headerOptions, ['widget' => 'dropdown']);

                if ($this->renderDropdown($n, $item['items'], $panes)) {
                    Html::addCssClass($headerOptions, 'active');
                }

                Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle']);
                if (!isset($linkOptions['data-toggle'])) {
                    $linkOptions['data-toggle'] = 'dropdown';
                }
                $header = Html::a($label, "#", $linkOptions) . "\n"
                    . Dropdown::widget(['items' => $item['items'], 'clientOptions' => false, 'view' => $this->getView()]);
            } else {
                $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
                $options['id'] = ArrayHelper::getValue($options, 'id', $this->options['id'] . '-tab' . $n);

                Html::addCssClass($options, ['widget' => 'tab-pane']);
                if (ArrayHelper::remove($item, 'active')) {
                    Html::addCssClass($options, 'active');
                    Html::addCssClass($headerOptions, 'active');
                }

                if (isset($item['url'])) {
                    $header = Html::a($label, $item['url'], $linkOptions);
                } else {
                    if (!isset($linkOptions['data-toggle'])) {
                        $linkOptions['data-toggle'] = 'tab';
                    }
                    $header = Html::a($label, '#' . $options['id'], $linkOptions);
                }

                if ($this->renderTabContent) {
                    $tag = ArrayHelper::remove($options, 'tag', 'div');
                    $panes[] = Html::tag($tag, isset($item['content']) ? $item['content'] : '', $options);
                }
            }

            $headers[] = Html::tag('li', $header, $headerOptions);
        }

        Html::addCssClass($this->_panelHeaderOptions, 'panel-heading no-padding');
        echo Html::beginTag('div', $this->_panelHeaderOptions);
        echo Html::tag('ul', implode("\n", $headers), $this->options);
        echo Html::endTag('div');
        echo $this->renderPanes($panes);
    }
}
