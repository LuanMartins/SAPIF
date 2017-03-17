<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Regime */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Regime',
]) . $model->idregime;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regimes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idregime, 'url' => ['view', 'id' => $model->idregime]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="regime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
