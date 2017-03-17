<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode("SGPIF") ?></title>
    <link rel="icon" href="./logo/sgpif16x16.ico" type="image/x-icon" />

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img src=<?=Url::to("@web/logo/sgpif30x30.png")?>></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#about">Login</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Sobre o SGPIF</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contatos</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<?= $content ?>


<footer>
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2> Desenvolvido por: Luan de Melo Martins &copy; <?=date("Y")?></h2>

            </div>
        </div>
    </aside>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
