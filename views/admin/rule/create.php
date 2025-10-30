<?php

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */

$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    
    <h3><?= $this->params['header.subtitle'] ?></h3>
    
	<?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
