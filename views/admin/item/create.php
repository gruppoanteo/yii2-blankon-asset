<?php

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <h3><?= $this->params['header.subtitle'] ?></h3>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
