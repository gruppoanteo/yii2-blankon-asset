<?php
namespace anteo\blankon\widgets;

use yii\bootstrap\Button;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Html;

/**
 * Description of PanelActions
 *
 * @author marco
 */
class PanelActions extends ButtonDropdown
{
    public $label;
    
    public $encodeLabel = false;
    
     /**
     * Generates the button dropdown.
     * @return string the rendering result.
     */
    protected function renderButton()
    {
        if ($this->label === null) {
            $this->label = Html::icon('option-vertical');
        }
        Html::addCssClass($this->options, ['widget' => 'btn btn-sm btn-link']);
        $label = $this->label;
        if ($this->encodeLabel) {
            $label = Html::encode($label);
        }
        if ($this->split) {
            $options = $this->options;
            $this->options['data-toggle'] = 'dropdown';
            Html::addCssClass($this->options, ['toggle' => 'dropdown-toggle']);
            unset($this->options['id']);
            $splitButton = Button::widget([
                'label' => '<span class="caret"></span>',
                'encodeLabel' => false,
                'options' => $this->options,
                'view' => $this->getView(),
            ]);
        } else {
//            $label .= ' <span class="caret"></span>';
            $options = $this->options;
            if (!isset($options['href']) && $this->tagName === 'a') {
                $options['href'] = '#';
            }
            Html::addCssClass($options, ['toggle' => 'dropdown-toggle']);
            $options['data-toggle'] = 'dropdown';
            $splitButton = '';
        }
        
        return Button::widget([
            'tagName' => $this->tagName,
            'label' => $label,
            'options' => $options,
            'encodeLabel' => false,
            'view' => $this->getView(),
        ]) . "\n" . $splitButton;
    }
}