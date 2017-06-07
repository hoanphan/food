<?php

use kartik\widgets\SwitchInput;
use navatech\language\models\Language;
use navatech\language\Translate;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Distributor $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="distributor-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
?>
    <ul class="nav nav-tabs" role="tablist">
        <?php foreach (Language::getLanguages() as $key => $language): ?>
            <li class="<?= ($language->code == Yii::$app->language) ? 'active' : '' ?>">
                <a href="#tab_<?= $language->code ?>" role="tab" data-toggle="tab"><?= $language->name ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content" style="border: none; padding:16px 2px ">
        <?php foreach (Language::getLanguages() as $key => $language): ?>
            <div class="<?= ($language->code == Yii::$app->language) ? 'active in' : '' ?> tab-pane fade" id="tab_<?= $language->code ?>">
                <?php
                echo $form->field($model, 'name_' . $language->code, ['labelOptions' => ['class' => 'control-label col-sm-3']])->textInput([
                    'value' => $model->getIsNewRecord() ? '' : $model->getTranslateAttribute('name', $language->code),
                ])->label(Translate::name_category());
                ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?=$form->field($model,'address')->textInput(['placeholder' => 'Enter Address...', 'maxlength' => 255])?>
    <?=$form->field($model,'email')->textInput(['placeholder' => 'Enter Address...', 'maxlength' => 255,'type'=>'email'])?>
    <?=$form->field($model,'phone')->textInput(['placeholder' => 'Enter Address...', 'maxlength' => 255])?>
    <?= $form->field($model, 'status'
    )->widget(SwitchInput::className(), ['containerOptions' => ['class' => ''],'pluginOptions'=>[
        'onText'=>'Có',
        'offText'=>'Không'
    ]]); ?>
    <?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
