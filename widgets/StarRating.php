<?php

namespace hal\blankon\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class StarRating extends Widget
{
    public $stars = 5;
    
    public $value = 0;
    
    public $maxValue = 100;
    
    public $readonly = true;
    
    public $options = [];
    
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if ($this->maxValue <= 0) {
            $this->maxValue = 100;
        }
        if ($this->readonly) {
            Html::addCssStyle($this->options, 'pointer-events: none;');
        }
        Html::addCssClass($this->options, ['widget' => 'rating text-left']);
        echo Html::beginTag('div', $this->options);
        parent::init();
    }
    
    public function run()
    {
        $active = min(round($this->stars * $this->value / $this->maxValue), $this->stars);
        for ($i = $this->stars; $i >= 1; $i--) {
            $starOptions = ['class' => 'star'];
            if ($i == $active) {
                Html::addCssClass($starOptions, 'active');
            }
            echo Html::tag('span', '', $starOptions);
        }
        echo Html::endTag('div');
        parent::run();
    }
}

