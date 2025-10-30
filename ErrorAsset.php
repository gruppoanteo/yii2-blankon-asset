<?php
namespace hal\blankon;

class ErrorAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/hal/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/error-page.css'
    ];
    
    public $js = [
    ];
    
    public $depends = [
        'hal\blankon\BlankonAsset',
    ];
}