<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CIdade */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cidade',
]) . $model->idcidade;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcidade, 'url' => ['view', 'id' => $model->idcidade]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
