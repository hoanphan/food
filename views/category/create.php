<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Category $model
 */

$this->title = Translate::create_category();
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
