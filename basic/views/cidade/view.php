<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CIdade */

$this->title = $model->idcidade;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcidade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcidade], [
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
            //  'idcidade',
            'nome',
            [
                'label' => 'Estado',
                'value' => $model->estadoIdestado->nome,
            ],

        ],
    ]) ?>

</div>
