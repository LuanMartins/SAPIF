<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CampusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Campuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Campus'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idcampus',
            'nome_campus',

            [
                'label' => 'Instituição',
                'attribute' => 'instituicao_idinstituicao1',
                'value'=>'instituicaoIdinstituicao1.nome'
            ],

            [
                'label' => 'Cidade',
                'attribute' => 'cidade_cidade',
                'value'=>'cidadeIdcidade.nome'
            ],
            [
                'label' => 'Turno',
                'attribute' => 'turno_idturno',
                'value'=>'turnoIdturno.turno'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
