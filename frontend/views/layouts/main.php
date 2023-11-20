<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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

<body>
    <?php $this->beginBody() ?>
    <div id="main" class="container-fluid p-0 vh-100 overflow-hidden position-relative">
        <nav class="navbar navbar-expand-md navbar-dark align-content-center" style="z-index: 100;">
            <a class="navbar-brand" href="index.html">
                <img id="logo" src="assets/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon p-0 m-0"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav text-right pr-2">
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</i></a></li>
                    <li id="cart" class="nav-item ml-4"><a href="cart.html" class="nav-link"><span id="cart-num"
                                class="mr-2 font-weight-bold"></span><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </nav>
        <div id="video" class="d-flex flex-wrap justify-content-center">
            <video autoplay muted loop src="<?= Yii::$app->request->baseUrl ?>/assets/bg-video.mp4"></video>
        </div>
        <div class="jumbotron bg-transparent mb-5 mx-auto h-50 text-center d-flex flex-wrap align-content-center">
            <h1 class="font-weight-bold text-lg-left display-4">Taste the best pizza in town.</h1>
            <a href="#menu"><button id="order-now" class="btn btn-warning mt-5">Order Now</button></a>

        </div>
    </div>
    <?= $content ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
