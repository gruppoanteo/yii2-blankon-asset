<?php

use hal\blankon\widgets\ActionColumn;
use mdm\admin\components\Helper;
use hal\blankon\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = ['label' => 'Radcheck'];
?>

<div class="radcheck-index">

    <h1><?= "Radcheck" ?></h1>

    <p>
        <?= Html::a(Yii::t('radius','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'radcheck-grid',
        'responsive' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
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
