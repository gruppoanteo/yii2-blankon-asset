<?php

use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->radacctid;
?> 

<div class="radacct-view">
    <h3><?= "$title #" . $model->radacctid ?></h3>
    
    <div class="row">
        <div class="col-md-6">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'radacctid',
                    'acctsessionid',
                    'acctuniqueid',
                    'username',
                    'groupname',
                    'realm',
                    'nasipaddress',
                    'nasportid',
                    'nasporttype',
                    'acctstarttime',
                    'acctstoptime',
                    'acctsessiontime',
                    'acctauthentic',
                    'connectinfo_start',
                    'connectinfo_stop',
                    'acctinputoctets',
                    'acctoutputoctets',
                    'calledstationid',
                    'callingstationid',
                    'acctterminatecause',
                    'servicetype',
                    'framedprotocol',
                    'framedipaddress',
                    'acctstartdelay',
                    'acctstopdelay',
                    'xascendsessionsvrkey',
                ],
            ]) ?>
        </div>
    </div>
</div>