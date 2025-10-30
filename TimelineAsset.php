<?php
namespace hal\blankon;

use yii\web\AssetBundle;

class TimelineAsset extends AssetBundle
{
    public $sourcePath = '@vendor/hal/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/timeline.css',
    ];
    public $js = [
    ];
    public $depends = [
        'hal\blankon\BlankonAsset',
    ];
}