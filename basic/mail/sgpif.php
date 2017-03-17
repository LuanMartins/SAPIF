<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
          rel="stylesheet" type=<?=Url::to('@web/index/css/stilo.css')?>>
    <title><?= Html::encode("Equipe SGPIF") ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h3>Interessado Na Permuta</h3>
<p><?=$nome?></p>
<br>
<p><center><?=$mensagem?></center></p>
<br>
<a
   href=<?= Url::toRoute(["/usuario/view-servidor/","id" => $idServidor],true); ?>>Perfil Do Usuário</a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
