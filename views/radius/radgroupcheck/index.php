<?php

use hal\blankon\widgets\ActionColumn;
use mdm\admin\components\Helper;
use hal\blankon\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = ['label' => 'Radgroupcheck'];
?>

<div class="radgroupcheck-index">

    <h1>Radgroupcheck</h1>

    <p>
        <?= Html::a(Yii::t('radius','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'radgroupcheck-grid',
        'responsive' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'groupname',
            'attribute',
            'op',
            'value',
            [
                'class' => ActionColumn::className(),
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>
</div>
