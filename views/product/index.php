<?php

use app\models\Product;
use navatech\language\Translate;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\searchs\ProductSearch $searchModel
 */

$this->title = Translate::list_product();
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Product', ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>

    <?php Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'imager',
                'value' => function (Product $data) {
                    return Html::img($data->getPictureUrl('imager') . '?t=' . time(), ['class' => 'img-thumbnail', 'style' => 'width: 100px;
    height: 100px;
']);
                },
                'filter' => false,
                'format' => 'raw',
            ],
            'name',
            [
                'attribute' => 'category_id',
                'value'=>function(Product $data)
                {
                    return  Product::getListCategory()[$data->category_id];
                }
            ],
            [
                'attribute' =>   'distributor_id',

                'value'=>function(Product $data)
                {
                    return  Product::getListDistributor()[$data->distributor_id];
                }
            ],

//            'price', 
            [
                'attribute' => 'status',
                'value' => function (Product $data) {
                    return Product::getStatus($data->status);
                },
                'filter' => Product::getStatus(),
                'format' => 'raw',
            ],
//            'serial', 
//            'prioritize', 
//            'sale', 

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
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]);
    Pjax::end(); ?>

</div>
