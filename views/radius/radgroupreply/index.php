<?php

use hal\blankon\widgets\ActionColumn;
use mdm\admin\components\Helper;
use hal\blankon\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = ['label' => 'Radgroupreply'];
?>

<div class="radgroupreply-index">

    <h1>Radgroupreply</h1>

    <p>
        <?= Html::a(Yii::t('radius','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'radgroupreply-grid',
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
