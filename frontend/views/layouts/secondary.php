<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Spot</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700|Mr+Dafoe|Roboto:400,700&display=swap"
        rel="stylesheet">
    <?php $this->head() ?>
</head>

<body style="overflow: auto;">
    <?php $this->beginBody() ?>
    <div id="about-bg" class="position-fixed vh-100 vw-100"></div>
    <nav class="navbar navbar-expand-md navbar-dark align-content-center" style="z-index: 100;">
        <a class="navbar-brand" href="<?= Url::to(['site/index']) ?>">
            <img id="logo" src="assets/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon p-0 m-0"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav text-right pr-2">
                <li class="nav-item"><a href="<?= Url::to(['site/about']) ?>" class="nav-link">About</a></li>
                <li class="nav-item"><a href="<?= Url::to(['site/contact']) ?>" class="nav-link">Contact</a></li>
                <li id="cart" class="nav-item ml-4"><a href="<?= Url::to(['site/cart']) ?>" class="nav-link"><span
                            id="cart-num" class="mr-2 font-weight-bold"></span><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <?= $content ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
