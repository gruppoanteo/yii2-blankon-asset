<?php

use hal\blankon\widgets\GridView;
use mdm\admin\components\Helper;
use hal\blankon\widgets\ActionColumn;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = ['label' => 'Radusergroup'];
?>

<div class="radusergroup-index">

    <h1>Radusergroup</h1>

    <p>
        <?= Html::a(Yii::t('radius','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'radusergroup-grid',
        'responsive' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'groupname',
            'priority',
            [
                'class' => ActionColumn::className(),
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>
</div>
