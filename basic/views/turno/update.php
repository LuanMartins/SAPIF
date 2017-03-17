<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turno */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Turno',
]) . $model->idturno;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idturno, 'url' => ['view', 'id' => $model->idturno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="turno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
