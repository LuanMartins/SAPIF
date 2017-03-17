<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



<div class="">

    <div class="clearfix"></div>


    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')){ ?>

    <div class="alert alert-success">
        Seu Email Foi Enviado Com Sucesso!!!
    </div>

    <p>

        <?php }
        ?>
    </p>


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
                            <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                            </li>
                        </ul>

                        <div id="cor">
                            <?php Modal::begin([
                                'header' =>  '<center><h2>Envie Sua Mensagem</h2></center>',
                                'toggleButton' => ['class'=>"btn btn-success",'label'=>"<a><i class='fa fa-envelope m-right-xs'></i> Mande Sua Mensagem</a>"],
                            ]); ?>

                            <center>
                            <?php if(isset($consulta2)&& $consulta2 != null){ ?>
                                De: <?=$consulta2->user->email?>
                            <?php }?>
                            <hr>
                            Para: <?= $informacao->user->email ?>
                            <hr>



                            <?php $form = ActiveForm::begin(['method'=>'post','action'=>'mensagem']);


                            ?>





                            <?=  $form->field($model, 'mensagem')->textArea(['rows' => 6]) ;?>

                            

                            <?= $form->field($model,'emailReceptor')->hiddenInput(['value'=>$informacao->user->email])->label(false) ?>





                            <button type="submit" class="btn btn-success btn-xs">Enviar </button>

                                </center>

                            <?php ActiveForm::end()?>

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
                                            <h3><i>Campus De Trabalho</i></h3> <?= $informacao->campusIdcampus->nome_campus ." "."<h4>Horário De Funcionamento</h4>".$informacao->campusIdcampus->turnoIdturno->turno." "."<h4>Campus Situado Na Instituição</h4> ".$informacao->campusIdcampus->instituicaoIdinstituicao1->nome?>
                                        </li>


                                    </ul>
                                    <!-- end recent activity -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                    <ul class="messages">
                                        <div id="centralizar">

                                            <li>
                                                <h3><i><center>Opnião Sobre a Cidade</center></i></h3> <p><?= $informacao->opniao_cidade?></p>
                                            </li>

                                            <li>
                                                <h3><i><center>Opnião Sobre o Campus </center></i></h3> <p> <?= $informacao->opniao_campus ." "?></p>
                                            </li>
                                            
                                        </div>
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
</script>
<!-- /datepicker -->
