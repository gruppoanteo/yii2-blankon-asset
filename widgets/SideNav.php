<?php
namespace hal\blankon\widgets;

use yii\base\InvalidConfigException;
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Description of Sidenav
 *
 * @author marco
 */
class SideNav extends \kartik\nav\NavX
{
    /**
     * @var array list of items in the nav widget. Each array element represents a single
     * menu item which can be either a string or an array with the following structure:
     *
     * - icon: string, required, the nav item icon.
     * - label: string, required, the nav item label.
     * - url: optional, the item's URL. Defaults to "#".
     * - visible: boolean, optional, whether this menu item is visible. Defaults to true.
     * - linkOptions: array, optional, the HTML attributes of the item's link.
     * - options: array, optional, the HTML attributes of the item container (LI).
     * - active: boolean, optional, whether the item should be on active state or not.
     * - dropDownOptions: array, optional, the HTML options that will passed to the [[Dropdown]] widget.
     * - items: array|string, optional, the configuration array for creating a [[Dropdown]] widget,
     *   or a string representing the dropdown menu. Note that Bootstrap does not support sub-dropdown menus.
     * - encode: boolean, optional, whether the label will be HTML-encoded. If set, supersedes the $encodeLabels option for only this item.
     *
     * If a menu item is a string, it will be rendered directly without HTML encoding.
     */
    public $items = [];
    /**
     * @inheritdoc
     */
    public $encodeLabels = false;
    /**
     * @var boolean whether to activate parent menu items when one of the corresponding child menu items is active.
     */
    public $activateParents = true;
    /**
     * @inheritdoc
     */
    public $dropdownIndicator = '<span class="arrow fa-angle-double-right"></span>';
    
    public $dropdownClass = '\hal\blankon\widgets\DropdownX';

    /**
     * Initializes the widget.
     */
    public function init()
    {
        Html::addCssClass($this->options, ['widget' => 'sidebar-menu']);
        parent::init();
    }
    
    /**
     * @inheritdoc
     */
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];
        $icon = isset($item['icon']) ? Html::tag('span', $item['icon'], ['class' => 'icon']) : '';
        $label = Html::tag('span', $label, ['class' => 'text']);
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        if (empty($items)) {
            $items = '';
        } else {
            $linkOptions['data-toggle'] = 'dropdown';
//            Html::addCssClass($options, ['widget' => 'submenu']);
            Html::addCssClass($options, 'submenu');
            Html::addCssClass($linkOptions, 'dropdown-toggle');
//            $label .= $this->dropdownIndicator;
            if ($this->dropdownIndicator !== '') {
                $label .= ' ' . $this->dropdownIndicator;
            }
            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }
                $dropdown = $this->dropdownClass;
                $dropdownOptions = ArrayHelper::merge($this->dropdownOptions, [
                    'items' => $items,
                    'encodeLabels' => $this->encodeLabels,
                    'clientOptions' => false,
                    'view' => $this->getView(),
                ]);
                $items = $dropdown::widget($dropdownOptions);
            }
        }

        if ($this->activateItems && $active) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', Html::a($icon . " " . $label, $url, $linkOptions) . $items, $options);
    }

    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     * @throws InvalidConfigException
     */
//    public function renderItem($item)
//    {
//        if (is_string($item)) {
//            return $item;
//        }
//        if (!isset($item['label'])) {
//            throw new InvalidConfigException("The 'label' option is required.");
//        }
//        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
//        $icon = isset($item['icon']) ? Html::tag('span', $item['icon'], ['class' => 'icon']) : '';
//        $label = Html::tag('span', $item['label'], ['class' => 'text']);
//        $options = ArrayHelper::getValue($item, 'options', []);
//        $items = ArrayHelper::getValue($item, 'items');
//        $url = ArrayHelper::getValue($item, 'url', '#');
//        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
//
//        if (isset($item['active'])) {
//            $active = ArrayHelper::remove($item, 'active', false);
//        } else {
//            $active = $this->isItemActive($item);
//        }
//
//        if (empty($items)) {
//            $items = '';
//        } else {
//            Html::addCssClass($options, ['widget' => 'submenu']);
//            Html::addCssClass($item['dropDownOptions'], ['widget' => '']);
//            if ($this->dropDownCaret !== '') {
//                $label .= ' ' . $this->dropDownCaret;
//            }
//            if (is_array($items)) {
//                if ($this->activateItems) {
//                    $items = $this->isChildActive($items, $active);
//                }
//                $items = $this->renderDropdown($items, $item);
//            }
//        }
//
//        if ($this->activateItems && $active) {
//            Html::addCssClass($options, 'active');
//            $label .= Html::tag('span', '', ['class' => 'selected']);
//        }
//
//        return Html::tag('li', Html::a($icon . " " . $label, $url, $linkOptions) . $items, $options);
//    }
    
    
}