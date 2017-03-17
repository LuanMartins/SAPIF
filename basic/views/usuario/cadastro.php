<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\builder\Form;
/*Url Para o select2 poder funcionar e buscar os valores nas ações*/
$url = url::to(['site/lista-regime']);
$url2 = url::to(['site/lista-instituicao']);
$url3 = url::to(['site/lista-titulacao']);
$url4 = url::to(['site/lista-campus']);
$url5 = url::to(['site/lista-area']);
$url6 = url::to(['site/lista-campus-interesse']);
/* @var $this yii\web\View */
/* @var $model app\models\Servidor */
/* @var $form ActiveForm */
?>
<div class="site-cadastro">

    <legend class="text-info"><h1><center>Cadastre Seus Dados Pessoais</center></h1></legend>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','type'=>ActiveForm::TYPE_VERTICAL]]); ?>

     <?php echo Form::widget([
    'model'=>$model,
    'form'=>$form,
    'columns'=>2,
         'contentBefore' => '<legend class="text-info"><small>Dados Pessoais</small></legend>',
    'attributes'=>[       // 2 column layout
    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome do Usuário','maxlength' => true,'feedbackIcon' => [
        //'prefix' => 'fa fa-',
        'default' => 'user',
        'success' => 'user-plus',
        'error' => 'user-times',
        'defaultOptions' => ['class'=>'text-warning'],
    ]]],

     'telefone' =>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'yii\widgets\MaskedInput',
         'options'=>[
             'mask' => '(99)99999-9999'
         ]]


        
    ],



    ]);

     ?>



    <?php echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'contentBefore' => '<legend class="text-info"><small>Informações Adicionais</small></legend>',
        'attributes'=>[       // 2 column layout
            'regime_idregime'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>[


                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(regime) { return regime.text; }'),
                    'templateSelection' => new JsExpression('function (regime) { return regime.text; }'),
                ]
            ]],

            'titulacao_idtitulacao'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>['pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url3,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(titulo) { return titulo.text; }'),
                    'templateSelection' => new JsExpression('function (titulo) { return titulo.text; }'),
                ],
            ]],

            'instituicao_idinstituicao'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>[

                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url2,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(instituicao) { return instituicao.text; }'),
                    'templateSelection' => new JsExpression('function (instituicao) { return instituicao.text; }'),
                ]
            ]],


        ],



    ]);

    ?>


    <?php echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[       // 2 column layout


            'campus_idcampus'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>[

                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url4,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(campus) { return campus.text; }'),
                    'templateSelection' => new JsExpression('function (campus) { return campus.text; }'),
                ],
            ]],


            'area_idarea'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>[

                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url5,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(area) { return area.text; }'),
                    'templateSelection' => new JsExpression('function (area) { return area.text; }'),
                ]]],


            'upload'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => FileInput::classname(),'options'=>[

                'pluginOptions' => [
                    //'uploadUrl' => url::to(['@web/upload/imagens']),


                    // permite habilitar ou desabilitar o botão de upload
                    'showUpload' => false,

                    //'minImageWidth' => 900,
                    //'minImageHeight' => 300,
                    //'maxImageWidth' =>900,
                    //'maxImageHeight' => 300

                ],


                'options' => ['accept' => 'image/jpeg, image/png'],

            ]],
        ],



    ]);

?>

    <?= $form->field($model, 'tempo_trabalho',[
        'hintType' => ActiveField::HINT_SPECIAL,
        'hintSettings' => [
            'iconBesideInput' => true,
            'onLabelClick' => false,
            'onLabelHover' => false,
            'onIconClick' => true,
            'onIconHover' => true,
            'title' => '<i class="glyphicon glyphicon-info-sign"></i> Note'
        ]
    ])->hint('<b>A Quantidade de tempo de trabalho deve ser expressa em dias</b>')->textInput(['placeholder' => yii::t('app','Tempo de Trabalho')])
        ->input('number',['min'=>0])?>

    <?= $form->field($model, 'qtd_permutas')->input('number', ['min'=>1]) ?>
    <?= $form->field($model, 'user_id' )
        ->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false); ?>


        
    <?php echo Form::widget([
        'model'=>$modelInteresse,
        'form'=>$form,
        'columns'=>1,
        'contentBefore' => '<legend class="text-info"><small>Campus De Interesse</small></legend>',
        'attributes'=>[       // 2 column layout

            'campus_idcampus'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'kartik\widgets\Select2',  'options'=>[

                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url6,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(interesse) { return interesse.text; }'),
                    'templateSelection' => new JsExpression('function (interesse) { return interesse.text; }'),
                ]]]


        ],



    ]);

    ?>

        <?php echo Form::widget([
            'model'=>$model,
            'form'=>$form,
            'columns'=>2,
            'contentBefore' => '<legend class="text-info"><small>Opnião em Geral</small></legend>',
            'attributes'=>[
                'opniao_cidade'=>['type'=>Form::INPUT_TEXTAREA],
                'opniao_campus'=>['type'=>Form::INPUT_TEXTAREA],




            ],



        ]);

        ?>

        <?php echo Form::widget([
            'model'=>$modelDou,
            'form'=>$form,
            'columns'=>6,
            'contentBefore' => '<legend class="text-info"><small>Diário Oficial da União</small></legend>',
            'attributes'=>[

                'pagina'=>['type'=>Form::INPUT_TEXT],
                'secao'=>['type'=>Form::INPUT_TEXT],
                'data'=>['type'=>Form::INPUT_WIDGET,'widgetClass' =>'kartik\widgets\DatePicker','options'=>[

                    'pluginOptions'=>[

                        'autoclose'=>true,
                        'format' => 'M-dd-yyyy'
                    ]
                ]],

                'numero_vaga'=>['type'=>Form::INPUT_TEXT],
                'pos_concurso'=>['type'=>Form::INPUT_TEXT],
                'edicao'=>['type'=>Form::INPUT_TEXT],




            ],



        ]);

        ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>

    <style type="text/css">

        body{


            background-color: #2A3F54;
        }

        .site-cadastro{

            width: 90%;
            border: solid;
            margin: 0 auto;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 3%;
            padding:  2% 2% 2% 2%;
            background-color: white;



        }

    </style>

<<!-- site-cadastro -->
