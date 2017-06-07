<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Category $model
 */

$this->title = Translate::update_Category().' '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
