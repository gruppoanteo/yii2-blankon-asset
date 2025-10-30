<?php
namespace hal\blankon;

use yii\web\AssetBundle;

class IssueTrackerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/hal/yii2-blankon-asset/assets';
    
    public $css = [
        'admin/css/pages/project-issue-tracker.css',
    ];
    public $js = [
    ];
    public $depends = [
        'hal\blankon\BlankonAsset',
    ];
}