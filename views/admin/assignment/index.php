<?php

use anteo\blankon\widgets\GridView;
use mdm\admin\models\searchs\Assignment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel Assignment */

$this->title = 'Permessi';
$this->params['header.subtitle'] = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => $usernameField,
        'format' => 'html',
        'value' => function ($model) use ($usernameField){
            return $model->$usernameField . "<br/>" . 
                Html::tag('em', ArrayHelper::getValue($model, $this->context->fullnameField), ['class' => 'small']);
        }
    ],
    [
        'label' => 'Ruolo Assegnato',
        'format' => 'raw',
        'value' => function($model) {
            $out = [];
            foreach (array_keys(Yii::$app->authManager->getRolesByUser($model->id)) as $role) {
               $out[] = Html::tag('span', $role, ['class' => 'label label-primary']); 
            }
            return implode("\n", $out);
        }
    ]
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'anteo\blankon\widgets\ActionColumn',
    'template' => '{view}'
];

$dataProvider->sort->defaultOrder = ['username' => SORT_ASC];
?>
<div class="assignment-index">
	<?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
