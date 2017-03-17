<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Interesse */

$this->title = Yii::t('app', 'Create Interesse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interesse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
