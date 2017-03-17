<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\LinkPager;


$nome = null;
?>





<div class="x_panel" xmlns:html="http://www.w3.org/1999/html">
    <div class="x_content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <ul class="pagination pagination-split">
                    <li><a href="#">A</a></li>
                    <li><a href="#">B</a></li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                    <li><a href="#">E</a></li>
                    <li>...</li>
                    <li><a href="#">W</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Y</a></li>
                    <li><a href="#">Z</a></li>
                </ul>
            </div>

            <div class="clearfix"></div>

            <?php



            if(isset($models)&& $models != null){

            foreach ($models as $resultados) {

            ?>
            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                    <div class="col-sm-12">
                        <h4 class="brief"><i><?=$resultados->areaIdarea->nome?></i></h4>
                        <div class="left col-xs-7">
                            <h2><?=$resultados->nome?></h2>
                            <p><strong>Sobre: </strong> <?=$resultados->areaIdarea->nome?> </p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>

                            </ul>
                        </div>
                        <div class="right col-xs-5 text-center">
                            <img src=<?=url::to('@web/uploaded/imagens/'.$resultados['foto']);?> alt="" class="img-square img-responsive">
                        </div>
                    </div>


                    <div class="col-xs-12 bottom text-center">

                        <div class="col-xs-12 col-sm-12 emphasis">

                            <?php Modal::begin([
                                'header' => '<h2>Envie Sua Mensagem</h2>',
                                'toggleButton' => ['class'=> 'btn btn-success btn-xs','label' => "<i class='fa fa-comments-o'> </i>"]
                            ]);
                            ?>
                            
                            <?php if(isset($consulta2)&& $consulta2 != null){ ?>
                                De: <?=$consulta2->user->email?>
                            <?php }?>
                                <hr>
                                Para: <?= $resultados->user->email ?>
                                <hr>



                                <?php $form = ActiveForm::begin(['method'=>'post','action'=>'mensagem']);


                                ?>





                                <?=  $form->field($model, 'mensagem')->textArea(['rows' => 6]) ;?>

                                <?= $form->field($model,'emailEmisor')->hiddenInput(['value'=>$consulta2->user->email])->label(false)?>

                                <?= $form->field($model,'emailReceptor')->hiddenInput(['value'=>$resultados->user->email])->label(false) ?>





                            <button type="submit" class="btn btn-success btn-xs">Enviar </button>
                            
                                <?php ActiveForm::end();

                                ?>



                            <?php  Modal::end()?>



                            <?= html::a("<i class='fa fa-user'> </i> Visualizar Servidor",Url::to(['view-servidor','id' => $resultados->idservidores]),['class'=>"btn btn-primary btn-xs"])?>

                            <!---<button type="submit" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> Visualizar Servidor
                            </button> ---->
                        </div>



                    </div>
                </div>
            </div>



                <?php
            }

            }else{

                ?>
                <legend class="text-info"><small><h1><center>Sem Resultados</center></h1></small></legend>
                <?=Html::a("<i class='glyphicon glyphicon-chevron-left'> </i>",Url::to('pesquisa'),['class' => "btn-primary"])?>

            <?php }?>

            <div id="paginacao">
                <?php echo LinkPager::widget([
                    'pagination' => $pages,
                    'firstPageLabel' => true,
                    'lastPageLabel' => true,
                ]);
                ?>
            </div>



        </div>
    </div>
</div>



              