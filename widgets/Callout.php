<?php

namespace hal\blankon\widgets;

use yii\bootstrap\Alert;
use yii\helpers\Html;

class Callout extends Alert
{
    public $closeButton = false;
    
    protected function initOptions()
    {
        Html::addCssClass($this->options, 'callout fade in');

        if ($this->closeButton !== false) {
            $this->closeButton = array_merge([
                'data-dismiss' => 'alert',
                'aria-hidden' => 'true',
                'class' => 'close',
            ], $this->closeButton);
        }
    }
}