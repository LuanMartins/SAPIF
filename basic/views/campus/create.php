<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Campus */

$this->title = Yii::t('app', 'Create Campus');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Campuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
