<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/bootstrap.css',
        'css/styles.css',
        //'sweetalert2.min.css',
    ];
    public $js = [
        "js/jquery-3.4.1.js",
        "https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js",
        "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js",
        "https://kit.fontawesome.com/416fea9e90.js",
        "js/bootstrap.js",
        "sweetalert2.min.js",
        "js/scripts.js",
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap5\BootstrapAsset',
    ];
}
