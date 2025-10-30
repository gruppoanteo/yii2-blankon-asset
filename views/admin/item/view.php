<?php

use mdm\admin\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = 'Permessi';
$this->params['header.subtitle'] = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
        'items' => $model->getItems()
    ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('@mdm/admin/views/item/_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="auth-item-view">
    <!--<h3><?= $this->params['header.subtitle'] ?></h3>-->
    <div class="text-right mb-10">
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?php
        echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);
        ?>
        <?= Html::a(Yii::t('rbac-admin', 'Create New'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="row mb-10">
        <div class="col-sm-11">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'description:ntext',
                    'ruleName',
                    'data:ntext',
                ],
                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>'
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <input class="form-control search" data-target="available"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for available') ?>">
            <select multiple size="20" class="form-control list" data-target="available">
            </select>
        </div>
        <div class="col-sm-1 text-center">
            <br><br>
            <?=
            Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                'class' => 'btn btn-success btn-assign', 'data-target' => 'available'])
            ?><br>
            <?=
            Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                'class' => 'btn btn-danger btn-assign', 'data-target' => 'assigned'])
            ?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
            <select multiple size="20" class="form-control list" data-target="assigned">
            </select>
        </div>
    </div>
</div>
