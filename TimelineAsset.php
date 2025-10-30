<?php
namespace anteo\blankon;

use yii\web\AssetBundle;

class TimelineAsset extends AssetBundle
{
    public $sourcePath = '@vendor/anteo/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/timeline.css',
    ];
    public $js = [
    ];
    public $depends = [
        'anteo\blankon\BlankonAsset',
    ];
}