<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\NavBar;
use app\widgets\Sidebar;
use yii\helpers\Html;
$assets=AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title></title>
    <?php $this->head() ?>
    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }

</style>


<script type="text/javascript" src="<?=$assets->baseUrl?>/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>
<img src="<?=$assets->baseUrl?>/image-resources/blurred-bg/blurred-bg-3.jpg" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content row">
        <?=$content?>

    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
