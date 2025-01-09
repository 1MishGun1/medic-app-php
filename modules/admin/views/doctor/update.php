<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Doctor $model */

$this->title = 'Редактировать данные врача: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список врачей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="doctor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
