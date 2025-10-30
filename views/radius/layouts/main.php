<?php

use anteo\radius\controllers\NasController;
use anteo\radius\controllers\RadacctController;
use anteo\radius\controllers\RadcheckController;
use anteo\radius\controllers\RadgroupcheckController;
use anteo\radius\controllers\RadgroupreplyController;
use anteo\radius\controllers\RadreplyController;
use anteo\radius\controllers\RadusergroupController;
use anteo\radius\models\Nas;
use yii\bootstrap\Nav;

$navType = 'nav-' . $this->context->module->navType;
?>

<?php $this->beginContent($this->context->module->appLayout); ?>

<div class="radius-module">
    
    <div class="panel panel-tab panel-tab-double shadow">
        <div class="panel-heading no-padding">

            <?= Nav::widget([
                'options' => ['class' => "nav {$navType}"],
                'items' => [
                    [
                        'label' => 'Radcheck',
                        'url' => ['/radius/radcheck/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadcheckController,
                    ],
                    [
                        'label' => 'Radreply',
                        'url' => ['/radius/radreply/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadreplyController,
                    ],
                    [
                        'label' => 'Radacct',
                        'url' => ['/radius/radacct/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadacctController,
                    ],
                    [
                        'label' => 'NAS',
                        'url' => ['/radius/nas/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof NasController,
                        'visible' => Nas::getDb()->getTableSchema(Nas::tableName()) !== null
                    ],
                    [
                        'label' => 'Radgroupcheck',
                        'url' => ['/radius/radgroupcheck/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadgroupcheckController,
                    ],
                    [
                        'label' => 'Radgroupreply',
                        'url' => ['/radius/radgroupreply/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadgroupreplyController,
                    ],
                    [
                        'label' => 'Radusergroup',
                        'url' => ['/radius/radusergroup/index'],
                        'options' => ['class' => 'nav-border nav-border-top-success'],
                        'active' => $this->context instanceof RadusergroupController,
                    ],
                ]
            ]) ?>
            
        </div>
        <div class="panel-body radius">
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>