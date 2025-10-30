<?php
namespace hal\blankon;

class PluginAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower';
    
    public $css = [
        'animate.css/animate.min.css'
    ];
    
    public $js = [
        'jquery.nicescroll/jquery.nicescroll.min.js',
        'jquery.cookie/jquery.cookie.js',
        'jquery.easing/js/jquery.easing.min.js',
//        'retina.js/dist/retina.min.js'
    ];
    
    public $depends = [
        'hal\blankon\IE9Asset',
        'yii\web\JqueryAsset',
    ];
}