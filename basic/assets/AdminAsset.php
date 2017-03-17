<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/index';
    public $baseUrl = '@web/index';
    public $css = [
        'css/creative2.css',
        'css/round-about.cs',
        'css/admin.css',
        'vendor/font-awesome/css/font-awesome.min.css',
        //'vendor/bootstrap/css/bootstrap.min.css',

    ];
    public $js = [
        'js/creative.js',
        'vendor/magnific-popup/jquery.magnific-popup.min.js',
        'js/jquery-esing.js',
        'js/html5.js',
        'js/respond.js',
        'vendor/scrollreveal/scrollreveal.min.js',
        //'vendor/bootstrap/js/bootstrap.min.js',
        'vendor/jquery/jquery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
