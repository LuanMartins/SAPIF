<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */

$this->title = $model->idcampus;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Campuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcampus], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcampus], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcampus',
            'nome_campus',
            [
                'label' => 'Instituição',
                'value' => $model->instituicaoIdinstituicao1->nome,

            ],

            [
                'label' => 'Cidade',
                'value' => $model->cidadeIdcidade->nome,

            ],

            [
                'label' => 'Turno',
                'value' => $model->turnoIdturno->turno,

            ],
            
        ],
    ]) ?>

</div>
