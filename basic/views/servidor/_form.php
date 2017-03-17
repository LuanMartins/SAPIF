<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servidor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servidor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_trabalho')->textInput() ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qtd_permutas')->textInput() ?>

    <?= $form->field($model, 'regime_idregime')->textInput() ?>

    <?= $form->field($model, 'titulacao_idtitulacao')->textInput() ?>

    <?= $form->field($model, 'instituicao_idinstituicao')->textInput() ?>

    <?= $form->field($model, 'campus_idcampus')->textInput() ?>

    <?= $form->field($model, 'area_idarea')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
