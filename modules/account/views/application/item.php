<?php

use yii\bootstrap5\Html;
?>
<div class="card" style="width: 26rem;">
  <div class="card-body">
    <h5 class="card-title">Обращение №<?= $model->id ?> от <?= $model->create_at ?></h5>
    <h6 class="card-text">ФИО доктора: <?= $model->doctor->name ?></h6>
    <h6 class="card-text">Жалобы: <?= $model->complaints ? $model->complaints->title : $model->comment ?></h6>
    <h6 class="card-text">Дата: <?= $model->date ?></h6>
    <h6 class="card-text">Время: <?= $model->time ?></h6>
    <h6 class="card-text">Статус: <?= $model->status->title ?></h6>

    <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary w-100']) ?>
  </div>
</div>