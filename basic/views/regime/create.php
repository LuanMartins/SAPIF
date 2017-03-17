<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regime */

$this->title = Yii::t('app', 'Create Regime');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regimes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
