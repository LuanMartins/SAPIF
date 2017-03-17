<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Instituicao',
]) . $model->idinstituicao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Instituicaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinstituicao, 'url' => ['view', 'id' => $model->idinstituicao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="instituicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
