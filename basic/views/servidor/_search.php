<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServidorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servidor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idservidores') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tempo_trabalho') ?>

    <?= $form->field($model, 'telefone') ?>

    <?= $form->field($model, 'qtd_permutas') ?>

    <?php // echo $form->field($model, 'regime_idregime') ?>

    <?php // echo $form->field($model, 'titulacao_idtitulacao') ?>

    <?php // echo $form->field($model, 'instituicao_idinstituicao') ?>

    <?php // echo $form->field($model, 'campus_idcampus') ?>

    <?php // echo $form->field($model, 'area_idarea') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
