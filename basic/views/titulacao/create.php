<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Titulacao */

$this->title = Yii::t('app', 'Create Titulacao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Titulacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
