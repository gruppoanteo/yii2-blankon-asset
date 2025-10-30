<?php
namespace anteo\blankon\widgets;

use yii\helpers\Html;

/**
 * Description of GridView
 *
 * @author marco
 */
class GridView extends \yii\grid\GridView
{
    public $tableOptions = [];
    
    public $responsive = false;
    
//    private $_colors = [
//        'default',
//        'success',
//        'info',
//        'primary',
//        'warning',
//        'danger',
//        'lilac',
//        'inverse',
//    ];
    
    public function init()
    {
        if ($this->responsive) {
            Html::addCssClass($this->options, 'table-responsive');
        }
        Html::addCssClass($this->tableOptions, ['widget' => 'table table-striped']);
        Html::addCssClass($this->tableOptions, ['color' => 'table-default']);
        parent::init();
    }
}