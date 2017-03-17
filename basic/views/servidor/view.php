<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servidor */

$this->title = $model->idservidores;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servidors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servidor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idservidores], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idservidores], [
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
            'idservidores',
            'nome',
            'tempo_trabalho',
            'telefone',
            'qtd_permutas',
            'regimeIdregime.nome_regime',
            'titulacaoIdtitulacao.titulo',
            'instituicaoIdinstituicao.nome',
            'campusIdcampus.nome_campus',
            'areaIdarea.nome',
            'user.username',
            [

                'label' => 'Foto',
                'value' => $model->getHtmlImage(),
                'format' => ['image',['width'=>'400','height'=>'100']]
            ]


        ],
    ]) ?>

</div>
