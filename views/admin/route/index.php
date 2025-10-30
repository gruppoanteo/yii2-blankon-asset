<?php

use mdm\admin\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $routes [] */

$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'routes' => $routes,
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('@mdm/admin/views/route/_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<h3><?= $this->params['header.subtitle'] ?></h3>
<div class="row">
    <div class="col-sm-11">
        <div class="input-group">
            <input id="inp-route" type="text" class="form-control"
                   placeholder="<?= Yii::t('rbac-admin', 'New route(s)') ?>">
            <span class="input-group-btn">
                <?=
                Html::a(Yii::t('rbac-admin', 'Add') . $animateIcon, ['create'], ['class' => 'btn btn-success',
                    'id' => 'btn-new'])
                ?>
            </span>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-sm-5">
        <div class="input-group">
            <input class="form-control search" data-target="available"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for available') ?>">
            <span class="input-group-btn">
                <?=
                Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['refresh'], [
                    'class' => 'btn btn-default', 'id' => 'btn-refresh'])
                ?>
            </span>
        </div>
        <select multiple size="20" class="form-control list" data-target="available"></select>
    </div>
    <div class="col-sm-1 text-center">
        <br><br>
        <?=
        Html::a('&gt;&gt;' . $animateIcon, ['assign'], [
            'class' => 'btn btn-success btn-assign', 'data-target' => 'available'])
        ?><br>
        <?=
        Html::a('&lt;&lt;' . $animateIcon, ['remove'], [
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
