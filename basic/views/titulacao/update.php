<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Titulacao */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Titulacao',
]) . $model->idtitulacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Titulacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtitulacao, 'url' => ['view', 'id' => $model->idtitulacao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="titulacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
