<?php

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Update Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');
?>
<div class="auth-item-update">

	<h3><?= $this->params['header.subtitle'] ?></h3>
    
	<?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
