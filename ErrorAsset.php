<?php
namespace anteo\blankon;

class ErrorAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/anteo/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/error-page.css'
    ];
    
    public $js = [
    ];
    
    public $depends = [
        'anteo\blankon\BlankonAsset',
    ];
}