<?php

use app\models\Category;
use app\models\Distributor;
use app\models\GalleyProduct;
use app\models\Product;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use kartik\widgets\SwitchInput;
use navatech\language\models\Language;
use navatech\language\Translate;
use navatech\roxymce\widgets\RoxyMceWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var app\models\Product $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="product-form">

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
            <div class="<?= ($language->code == Yii::$app->language) ? 'active in' : '' ?> tab-pane fade"
                 id="tab_<?= $language->code ?>">
                <?php
                echo $form->field($model, 'name_' . $language->code, ['labelOptions' => ['class' => 'control-label col-sm-3']])->textInput([
                    'value' => $model->getIsNewRecord() ? '' : $model->getTranslateAttribute('name', $language->code),
                ])->label(Translate::name_product());
                ?>
                <?php echo $form->field($model, 'title_' . $language->code, ['labelOptions' => ['class' => 'control-label col-sm-3']])->textInput([
                    'value' => $model->getIsNewRecord() ? '' : $model->getTranslateAttribute('name', $language->code),
                ])->label(Translate::name_title());
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-2"> <?= Translate::content() ?></label>
                    <div class="col-md-10"><?php echo $form->field($model, 'content_' . $language->code, [
                            'template' => '{label}{input}',
                        ])->widget(RoxyMceWidget::className()
                        ) ?></div>
                </div>
                ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="form-gruop">
        <div class="col-md-6">
    <?= $form->field($model, 'category_id')->widget(Select2::className(), [
        'data' => Product::getListCategory(),
        'options' => ['placeholder' => 'Chọn danh mục...'],
        'pluginOptions' => [
            'allowClear' => true
        ],]) ?>
    <?= $form->field($model, 'distributor_id')->widget(Select2::className(), [
        'data' => Product::getListDistributor(),
        'options' => ['placeholder' => 'Chọn nhà phân phối...'],
        'pluginOptions' => [
            'allowClear' => true
        ],]) ?>
    <?= $form->field($model, 'price', [

    ])->textInput([
        'type' => 'number',
        'min' => 0,
    ]) ?>
    <?= $form->field($model, 'sale', [

    ])->textInput([
        'type' => 'number',
        'min' => 0,
    ]) ?>
    <?= $form->field($model, 'status'
    )->widget(SwitchInput::className(), ['containerOptions' => ['class' => ''], 'pluginOptions' => [
        'onText' => 'Có',
        'offText' => 'Không'
    ]]); ?>
        </div>
    <div class="col-md-6">
        <?php echo $form->field($model, 'picture')->widget(FileInput::className(), [
            'options'       => [
                'accept'      => 'image/*',
                'placeholder' => Translate::image(),
            ],
            'pluginOptions' => [
                'allowedFileExtensions'                          => [
                    'jpg',
                    'gif',
                    'png',
                ],
                'showUpload'                                     => false,
                $model->getIsNewRecord() ? '' : 'initialPreview' => [
                    Html::img($model->getPictureUrl('imager').'?t='.time(), ['class' => 'file-preview-image']),
                ],
            ],
        ])->label('Image'); ?>
        <?php echo $form->field($galley, 'img[]')->widget(FileInput::className(), [
            'options'       => [
                'accept'      => 'image/*',
                'multiple'    => true,
                'placeholder' => 'Thư viện ảnh',
            ],
            'pluginOptions' => [
                'uploadUrl'                => false,
                'overwriteInitial'         => false,
                'initialPreviewAsData'     => true,
                'initialPreviewShowDelete' => true,
                'initialPreviewConfig'     => GalleyProduct::initialPreviewConfig($model->id),
                'allowedFileExtensions'    => [
                    'jpg',
                    'gif',
                    'png',
                ],
                'showUpload'               => false,
                'initialPreview'           => $model->id == null ? [] : $model->getPictureUrl1(),
            ],
        ])->label('Gallery product')
        ?>
    <?php

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ?>
    </div>
    <?php
    ActiveForm::end(); ?>
    </div>
</div>
