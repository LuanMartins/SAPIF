<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use kartik\builder\Form;

$url = url::to(['/site/lista-regime']);
$url2 = url::to(['/site/lista-instituicao']);
$url3 = url::to(['/site/lista-titulacao']);
$url4 = url::to(['/site/lista-campus']);
$url5 = url::to(['/site/lista-area']);
$url6 = url::to(['/site/lista-campus-interesse']);
?>




<div id="painel">

<div class="">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')){ ?>
<div class="x_panel">




    <div class="clearfix">




        <div id="botao">
        <button type="button" onclick="desaparecer('painel')"><i class="fa fa-close"></i></button>
        </div>



    </div>




                <div class="alert alert-success">
                    Seu Email Foi Enviado Com Sucesso!!!
                </div>

                <p>


                </p>

    </div>
</div>
    </div>

    <?php }
    ?>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Informações do Usuário <small><?=$informacao['nome']?></:></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                                    <div class="profile_img">

                                        <!-- end of image cropping -->
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src=<?=url::to('@web/uploaded/imagens/'.$informacao['foto']);?> alt="Avatar" title="Change the avatar">

                                            <!-- Cropping modal -->
                                            <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                                            <div class="modal-header">
                                                                <button class="close" data-dismiss="modal" type="button">&times;</button>
                                                                <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="avatar-body">

                                                                    <!-- Upload image and data -->
                                                                    <div class="avatar-upload">
                                                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                                                        <input class="avatar-data" name="avatar_data" type="hidden">
                                                                        <label for="avatarInput">Local upload</label>
                                                                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                                                    </div>

                                                                    <!-- Crop and preview -->
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <div class="avatar-wrapper"></div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="avatar-preview preview-lg"></div>
                                                                            <div class="avatar-preview preview-md"></div>
                                                                            <div class="avatar-preview preview-sm"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row avatar-btns">
                                                                        <div class="col-md-9">
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                                                            </div>
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                                                                <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="modal-footer">
                                                                              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                                            </div> -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->

                                            <!-- Loading state -->
                                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                        </div>
                                        <!-- end of image cropping -->

                                    </div>
                                    <h3><?=$informacao->nome?></h3>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-phone user-profile-icon"></i><?= " ".$informacao->telefone?>
                                        </li>

                                        <li class="m-top-xs">
                                            <i class="fa fa-graduation-cap user-profile-icon"></i><?= " ".$informacao->areaIdarea->nome?>

                                        </li>

                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i><?= " ".$informacao->instituicaoIdinstituicao->nome?>
                                        </li>


                                    </ul>

                                    <div id="cor">
                                    <?php Modal::begin([
                                    'header' =>  "<h1><center>Atualize Seus Dados Pessoais</center></h1>",
                                    'toggleButton' => ['class'=>"btn btn-success",'label'=>"<a><i class='fa fa-edit m-right-xs'></i>Editar Perfil</a>"],
                                    ]); ?>

                                        <div class="site-cadastro">



                                                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','type'=>ActiveForm::TYPE_VERTICAL]]); ?>

                                                <?php echo Form::widget([
                                                    'model'=>$model,
                                                    'form'=>$form,
                                                    'columns'=>2,
                                                    'contentBefore' => '<legend class="text-info"><small>Dados Pessoais</small></legend>',
                                                    'attributes'=>[       // 2 column layout
                                                        'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['value'=>$informacao->nome,'maxlength' => true,'feedbackIcon' => [
                                                            //'prefix' => 'fa fa-',
                                                            'default' => 'user',
                                                            'success' => 'user-plus',
                                                            'error' => 'user-times',
                                                            'defaultOptions' => ['class'=>'text-warning'],
                                                        ]]],

                                                        'telefone' =>['type'=>Form::INPUT_WIDGET, 'widgetClass' => 'yii\widgets\MaskedInput',
                                                            'options'=>[
                                                                'value' => $informacao->telefone,
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
                                                    ],
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
                                                        'opniao_cidade'=>['type'=>Form::INPUT_TEXTAREA,'options'=>['value' => $informacao->opniao_cidade]],
                                                        'opniao_campus'=>['type'=>Form::INPUT_TEXTAREA,'options'=>['value' => $informacao->opniao_campus]],




                                                    ],



                                                ]);

                                                ?>

                                                <?php echo Form::widget([
                                                    'model'=>$modelDou,
                                                    'form'=>$form,
                                                    'columns'=>3,
                                                    'contentBefore' => '<legend class="text-info"><small>Diário Oficial da União</small></legend>',
                                                    'attributes'=>[

                                                        'pagina'=>['type'=>Form::INPUT_TEXT,'options'=>['value' => $informacao->douIddou->pagina]],
                                                        'secao'=>['type'=>Form::INPUT_TEXT,'options'=>['value' => $informacao->douIddou->secao]],
                                                        'data'=>['type'=>Form::INPUT_WIDGET,'widgetClass' =>'kartik\widgets\DatePicker','options'=>[
                                                            'value' => $informacao->douIddou->data,

                                                            'pluginOptions'=>[

                                                                'autoclose'=>true,
                                                                'format' => 'dd-M-yyyy'
                                                            ]
                                                        ]],





                                                    ],



                                                ]);

                                                ?>


                                            <?php echo Form::widget([
                                                'model'=>$modelDou,
                                                'form'=>$form,
                                                'columns'=>3,

                                                'attributes'=>[


                                                    'numero_vaga'=>['type'=>Form::INPUT_TEXT,'options'=>['value' => $informacao->douIddou->numero_vaga]],
                                                    'pos_concurso'=>['type'=>Form::INPUT_TEXT,'options'=>['value' => $informacao->douIddou->pos_concurso]],
                                                    'edicao'=>['type'=>Form::INPUT_TEXT,'options'=>['value' => $informacao->douIddou->edicao]],




                                                ],



                                            ]);

                                            ?>


                                            <div class="form-group">
                                                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
                                            </div>
                                                <?php ActiveForm::end(); ?>
                                            </div>


                                     <?php Modal::end(); ?>

                                        </div>

                                    <br />

                                    <!-- start skills -->
                                    <!-- end of skills -->

                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <h2>Mais...</h2>
                                        </div>

                                    </div>
                                    <!-- start of user-activity-graph -->
                                    <!-- end of user-activity-graph -->

                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Demais Dados</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Opnião Cidade e Campus</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Dados Dou</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start recent activity -->
                                                <ul class="messages">


                                                    <li>
                                                        <h3><i>Tempo de Trabalho </i></h3> <?= $informacao->tempo_trabalho ." "?> Dias
                                                    </li>


                                                    <li>
                                                        <h3><i>Quantidade de Permutas </i></h3> <?= $informacao->qtd_permutas == null ? "Usuário Ainda Não realizou Permutas": $informacao->qtd_permutas ." Permuta Realizadas "?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Regime De Trabalho</i></h3> <?= $informacao->regimeIdregime->nome_regime ." "?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Sobre O Campus</i></h3><?= "<h4>Nome do Campus</h4>".$informacao->campusIdcampus->nome_campus . "<h4>Estado</h4>" . $informacao->campusIdcampus->instituicaoIdinstituicao1->estadoIdestado->nome . "<h4>Cidade</h4>".$informacao->campusIdcampus->cidadeIdcidade->nome. " "."<h4>Horário De Funcionamento</h4>".$informacao->campusIdcampus->turnoIdturno->turno." "."<h4>Instituição</h4> ".$informacao->campusIdcampus->instituicaoIdinstituicao1->nome?>
                                                    </li>






                                                </ul>
                                                <!-- end recent activity -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <ul class="messages">

                                                    <li>
                                                        <h3><i><center>Opnião Sobre a Cidade</center></i></h3> <p><?= $informacao->opniao_cidade?></p>
                                                    </li>

                                                    <li>
                                                        <h3><i><center>Opnião Sobre o Campus </center></i></h3> <p> <?= $informacao->opniao_campus ." "?></p>
                                                    </li>







                                                </ul>


                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                <ul class="messages">

                                                    <li>
                                                        <h3><i>Página</i></h3> <?= $informacao->douIddou->pagina?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Seção</i></h3> <?= $informacao->douIddou->secao?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Data Do DOU</i></h3> <?= $informacao->douIddou->data?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Numero Da Vaga</i></h3> <?= $informacao->douIddou->numero_vaga?>
                                                    </li>

                                                    <li>
                                                        <h3><i>Posição No Concurso</i></h3> <?= $informacao->douIddou->pos_concurso?>
                                                    </li>


                                                    <li>
                                                        <h3><i>Edição do DOU</i></h3> <?= $informacao->douIddou->edicao?>
                                                    </li>




                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






<!-- jQuery -->


<script>
    $(function() {
        Morris.Bar({
            element: 'graph_bar',
            data: [
                { "period": "Jan", "Hours worked": 80 },
                { "period": "Feb", "Hours worked": 125 },
                { "period": "Mar", "Hours worked": 176 },
                { "period": "Apr", "Hours worked": 224 },
                { "period": "May", "Hours worked": 265 },
                { "period": "Jun", "Hours worked": 314 },
                { "period": "Jul", "Hours worked": 347 },
                { "period": "Aug", "Hours worked": 287 },
                { "period": "Sep", "Hours worked": 240 },
                { "period": "Oct", "Hours worked": 211 }
            ],
            xkey: 'period',
            hideHover: 'auto',
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            ykeys: ['Hours worked', 'sorned'],
            labels: ['Hours worked', 'SORN'],
            xLabelAngle: 60,
            resize: true
        });

        $MENU_TOGGLE.on('click', function() {
            $(window).resize();
        });
    });



</script>

<!-- datepicker -->
<script type="text/javascript">


    function desaparecer(elemento){


        if(document.getElementById(elemento).style.visible == true) {

            var div = document.getElementById(elemento).style.visibility;

            div = 'none';
        }
    }

    $(document).ready(function() {

        var cb = function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
            console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
            console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
            console.log("cancel event fired");
        });
        $('#options1').click(function() {
            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
            $('#reportrange').data('daterangepicker').remove();
        });
    });


    function desaparecer(elemento){


        var div = document.getElementById(elemento).style.visibility;

        div = "hidden";
    }
</script>
<!-- /datepicker -->
