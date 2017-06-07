<?php
/**
 * Created by Navatech.
 * @project jav2u-org
 * @author  Phuong
 * @email   phuong17889[at]gmail.com
 * @date    11/04/2016
 * @time    11:47 CH
 * @var $this   View
 * @var $assets \yii\web\AssetBundle
 */
use app\components\View;
use navatech\language\widgets\LanguageWidget;
use yii\helpers\Url;

?>
<div id="page-header" class="bg-gradient-9">
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="<?=Url::toRoute(['site/index'])?>" class="logo-content-small" title="MonarchUI"></a>
    </div>
    <div id="header-logo" class="logo-bg">
        <a href="<?=Url::toRoute(['site/index'])?>" class="logo-content-big" title="MonarchUI">
            Monarch <i>UI</i>
            <span>The perfect solution for user interfaces</span>
        </a>
        <a href="<?=Url::toRoute(['site/index'])?>" class="logo-content-small" title="MonarchUI">
            Monarch <i>UI</i>
            <span>The perfect solution for user interfaces</span>
        </a>
        <a id="close-sidebar" href="#" title="Close sidebar">
            <i class="glyph-icon icon-angle-left"></i>
        </a>
    </div>
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="<?=$assets->baseUrl?>/image-resources/gravatar.jpg" alt="Profile image">
                <span><?=$this->user->username?></span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="<?=$assets->baseUrl?>/image-resources/gravatar.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <span>
                                <?=$this->user->role->name?>
                            </span>

                        </div>
                    </div>

                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="<?= Url::to(['/site/logout']) ?>" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->
    <div id="header-nav-right">
        <?php
        echo LanguageWidget::widget([
            //TODO type of widget ("selector" or "classic")
            'type'     => 'selector',
            //TODO uncommented to change size, default: 30, means width 30px & height 30px for every flag, from 10 to 300
            //'size'     => 30,
            //TODO uncommented to customize widget view
            //'viewDir' => '@vendor/navatech/yii2-multi-language/src/views/LanguageWidget',
        ]);
        ?>
    </div>
</div>