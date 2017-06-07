<?php

use app\models\Distributor;
use navatech\language\Translate;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\searchs\DistributorSearch $searchModel
 */

$this->title = Translate::list_distributor();
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Distributor', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'address',
            'email:email',
            'phone',
            [
                'attribute' => 'status',
                'value'     => function(Distributor $data) {
                    return Distributor::getStatus($data->status);
                },
                'filter'    => Distributor::getStatus(),
                'format'    => 'raw',
            ],
            [
                'header' => Translate::action(),
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
