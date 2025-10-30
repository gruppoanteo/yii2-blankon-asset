<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = 'Permessi';
$this->params['header.subtitle'] = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

    <div class="text-right mb-10">
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menuParent.name:text:Parent',
            'name',
            'route',
            'order',
        ],
    ]) ?>

</div>
