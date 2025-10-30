<?php
namespace anteo\blankon;

class LoginAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/anteo/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/sign.css'
    ];
    
    public $js = [
    ];
    
    public $depends = [
        'anteo\blankon\BlankonAsset',
    ];
}