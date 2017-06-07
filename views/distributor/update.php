<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Distributor $model
 */

$this->title =  Translate::update_distributor().' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributor-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
