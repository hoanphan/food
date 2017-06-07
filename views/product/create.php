<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Product $model
 */

$this->title = Translate::create_product();
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'galley'=>$galley
    ]) ?>

</div>
