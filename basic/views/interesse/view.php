<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Interesse */

$this->title = $model->servidor_idservidores;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interesse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'servidor_idservidores' => $model->servidor_idservidores, 'campus_idcampus' => $model->campus_idcampus], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'servidor_idservidores' => $model->servidor_idservidores, 'campus_idcampus' => $model->campus_idcampus], [
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
            'servidor_idservidores',
            'campus_idcampus',
        ],
    ]) ?>

</div>
