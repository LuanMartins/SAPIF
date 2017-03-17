<?php
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

?>
<div class="page-title">
    <div class="title_center">
        <legend class="text-info"><small><center><h1>Interessados<h1></center></small></legend>
    </div>




    <div class="title_center">
        <?php $form = ActiveForm::begin(['method'=>'get','action'=>['pesquisar'],]); ?>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <div class="input-group">

                 <?php echo Select2::widget([
                'name' => 'campus',
                'data' => $data,
                     'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                'placeholder' => 'Selecione o Seu Campus ...',
                'class' => "form-control"
                ],
                ]);
                 ?>



                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>

                    <input type="hidden" name="area" value=<?=$informacao->areaIdarea->nome?>>
                    <input type="hidden" name="idcampus" value=<?=$informacao->campus_idcampus?>>


                    <?php ActiveForm::end(); ?>


                </span>


            </div>

        </div>

    </div>

</div>



