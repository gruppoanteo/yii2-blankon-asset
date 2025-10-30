<?php
namespace hal\blankon;

class LoginAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/hal/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/sign.css'
    ];
    
    public $js = [
    ];
    
    public $depends = [
        'hal\blankon\BlankonAsset',
    ];
}