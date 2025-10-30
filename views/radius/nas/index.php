<?php

use hal\blankon\widgets\GridView;
use mdm\admin\components\Helper;
use hal\blankon\widgets\ActionColumn;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = ['label' => 'Nas'];
?>

<div class="nas-index">

    <p>
        <?= Html::a(Yii::t('radius','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'nas-grid',
        'responsive' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nasname',
            'shortname',
            'type',
            'ports',
            'secret',
            'community',
            'description',
            [
                'class' => ActionColumn::className(),
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>
</div>
