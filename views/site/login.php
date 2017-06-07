<?php
/* @var $this \app\components\View */
/* @var $content string */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
$this->title = 'Login';

?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class'=>'center-margin col-xs-11 col-sm-5'],
    'fieldConfig' => [
        'template' => "{input}</span>\n<div class=\"col-lg-12\">{error}</div>",
        'labelOptions' => ['label' => ''],
    ],
]); ?>
    <div id="login-form" class="content-box">
        <div class="content-box-wrapper pad20A">
            <div class="form-group">
                <h3 class="text-center pad25B font-gray font-size-23">Thi trắc nghiệm <span class="opacity-80"></span>
                </h3>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên tài khoản:</label>
                <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                    <?= $form->field($model, 'username')->textInput([
                        'placeholder'=>"Nhập tên tài khoản"
                    ]) ?>

                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu:</label>
                <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                    <?= $form->field($model, 'password')->passwordInput([  'placeholder'=>"Mật khẩu"]) ?>
                </div>
            </div>
            <div class="row">
                <div class="checkbox-primary col-md-6" style="height: 20px;">
                    <label>
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'class' => 'ace',
                            'template' => "<label class=\"inline\">{input}<span class=\"lbl\"> Remember Me</span></label>",
                        ]) ?>
                    </label>
                </div>

            </div>
        </div>
        <div class="button-pane">
            <?= Html::submitButton('Đăng nhập', [
                'class' => 'btn btn-block btn-primary',
                'name' => 'login-button',
            ]) ?>
        </div>
    </div>



<?php ActiveForm::end()?>