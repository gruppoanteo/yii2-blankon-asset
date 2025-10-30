<?php 
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use mdm\admin\AnimateAsset;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Assignment */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Assignment') . ' : ' . $userName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
        'items' => $model->getItems()
    ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('@mdm/admin/views/assignment/_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="assignment-index">
    <h3><?= $this->params['header.subtitle'] ?></h3>

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
            Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => (string)$model->id], [
                'class' => 'btn btn-success btn-assign', 'data-target' => 'available'])
            ?><br>
            <?=
            Html::a('&lt;&lt;' . $animateIcon, ['revoke', 'id' => (string)$model->id], [
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
