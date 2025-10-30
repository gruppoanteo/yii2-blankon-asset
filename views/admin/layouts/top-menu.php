<?php

use yii\bootstrap\Nav;
/* @var $this \yii\web\View */
/* @var $content string */

$module = \mdm\admin\Module::getInstance();
$controller = $this->context;
$menus = $module->menus;
$route = $controller->route;
foreach ($menus as $i => $menu) {
    $menus[$i]['options']['class'] = 'nav-border nav-border-top-success';
    $menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
?>
<?php $this->beginContent(Yii::$app->layoutPath . DIRECTORY_SEPARATOR . Yii::$app->layout . '.php') ?>
    <div class="panel panel-tab panel-tab-double shadow">
        <div class="panel-heading no-padding">
            <?= Nav::widget([
                'options' => ['class' => 'nav-tabs'],
                'items' => $menus,
            ]) ?>
        </div>
        <div class="panel-body">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>
