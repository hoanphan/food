<?php

use navatech\language\Translate;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Distributor $model
 */

$this->title = Translate::create_distributor();
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
