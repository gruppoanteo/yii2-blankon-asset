<?php
namespace hal\blankon\widgets;

use hal\fontawesome\FA;
use Yii;
use yii\helpers\Html;

/**
 * Description of ActiveColumn
 *
 * @author marco
 */
class ActionColumn extends \yii\grid\ActionColumn
{
    public $contentOptions = ['style' => 'width: 100px;'];
    
    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-xs btn-success'
                ], $this->buttonOptions);
                return Html::a(FA::icon(FA::_EYE), $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-xs btn-primary'
                ], $this->buttonOptions);
                return Html::a(FA::icon(FA::_PENCIL), $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => false,
                    'class' => 'btn btn-xs btn-danger'
                ], $this->buttonOptions);
                return Html::a(FA::icon(FA::_TIMES), $url, $options);
            };
        }
    }
}