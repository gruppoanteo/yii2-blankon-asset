<?php

use anteo\blankon\widgets\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = $title
?>

<div class="radacct-index">
    <h3><?= $title ?></h3>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'radacct-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'radacctid',
            'acctsessionid',
            'acctuniqueid',
            'username',
            'groupname',
            'realm',
            'acctterminatecause',
            'nasipaddress',
            'framedipaddress',
            [
                'attribute' => 'acctstarttime',
                'filter' => false,
            ],
            [
                'attribute' => 'acctstoptime',
                'filter' => false,
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}'
            ],
            /*
              'nasportid',
              'nasporttype',
              'acctsessiontime',
              'acctauthentic',
              'connectinfo_start',
              'connectinfo_stop',
              'acctinputoctets',
              'acctoutputoctets',
              'calledstationid',
              'callingstationid',
              'servicetype',
              'framedprotocol',
              'acctstartdelay',
              'acctstopdelay',
              'xascendsessionsvrkey',
             */
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>
</div>