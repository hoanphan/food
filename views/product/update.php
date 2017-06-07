<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Product $model
 */

$this->title =Translate::update_product() . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">



    <?= $this->render('_form', [
        'model' => $model,
        'galley'=>$galley
    ]) ?>

</div>
