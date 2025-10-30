<?php

namespace anteo\blankon;

use yii\web\AssetBundle;

class IE9Asset extends AssetBundle
{
    public $sourcePath = '@bower';
    
    public $jsOptions = [
        'condition' => 'lte IE9', 
        'position' => \yii\web\View::POS_HEAD
    ];
    public $css = [];
    
    public $js = [
        'html5shiv/dist/html5shiv.min.js',
        'respond/src/respond.js',
    ];

}