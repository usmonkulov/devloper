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
        // 'css/site.css',
        // 'css/bootstrap.min.css',
        'form/upload.css',
        'css/font-awesome.min.css',
        'css/style.css',
        'css/product.css',
        'css/blue.css',
        'https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600',
    ];
    public $js = [
        // 'js/jquery.min.js',
        // 'js/bootstrap.min.js',
        'form/upload.js',
        'js/main.js',
        'js/min.js',
        'js/icheck.min.js',
        'js/book-cart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
