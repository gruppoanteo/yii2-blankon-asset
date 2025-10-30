<?php

use hal\blankon\widgets\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var mdm\admin\models\AuthItemSearch $searchModel
 */
$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <div class="text-right mb-10">
        <?= Html::a(Yii::t('rbac-admin', 'Create Rule'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('rbac-admin', 'Name'),
            ],
            ['class' => 'hal\blankon\widgets\ActionColumn',],
        ],
    ]);
    Pjax::end();
    ?>

</div>
