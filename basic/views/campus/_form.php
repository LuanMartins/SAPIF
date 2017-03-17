<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */
/* @var $form yii\widgets\ActiveForm */
$url = Url::to('lista-turno');
$url2 = Url::to('lista-instituicao');
$url3 = Url::to('lista-cidade');



?>

<div class="campus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_campus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instituicao_idinstituicao1')->widget(Select2::classname(), [
        //'initValueText' => $cityDesc, // set the initial display text
        'options' => ['placeholder' => ' Pesquise pela Instituição ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Esperando por Resultados...'; }"),
            ],
            'ajax' => [
                'url' => $url2,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(instituicao) { return instituicao.text; }'),
            'templateSelection' => new JsExpression('function (instituicao) { return instituicao.text; }'),
        ],
    ]);?>

    <?= $form->field($model, 'cidade_idcidade')->widget(Select2::classname(), [
        //'initValueText' => $cityDesc, // set the initial display text
        'options' => ['placeholder' => 'Pesquise pela Cidade ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Esperando Por Resultados...'; }"),
            ],
            'ajax' => [
                'url' => $url3,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(cidade) { return cidade.text; }'),
            'templateSelection' => new JsExpression('function (cidade) { return cidade.text; }'),
        ],
    ]);?>

    <?= $form->field($model, 'turno_idturno')->widget(Select2::classname(), [
        //'initValueText' => $cityDesc, // set the initial display text
        'options' => ['placeholder' => 'Pesquise pelo Turno ...' ],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Esperando por Resultados...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(turno) { return turno.text; }'),
            'templateSelection' => new JsExpression('function (turno) { return turno.text; }'),
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
