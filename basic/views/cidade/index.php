<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CIdadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cidades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cidade'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idcidade',
            'nome',
            [

                'label' => 'Estado',
                'attribute' => 'turno_idturno',
                'value'=>'estadoIdestado.nome'
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
