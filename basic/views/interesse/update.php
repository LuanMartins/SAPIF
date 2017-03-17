<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Interesse */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Interesse',
]) . $model->servidor_idservidores;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->servidor_idservidores, 'url' => ['view', 'servidor_idservidores' => $model->servidor_idservidores, 'campus_idcampus' => $model->campus_idcampus]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="interesse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
