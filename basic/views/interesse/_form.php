<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Interesse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interesse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'servidor_idservidores')->textInput() ?>

    <?= $form->field($model, 'campus_idcampus')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
