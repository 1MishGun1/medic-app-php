<?php

use app\models\Doctor;
use yii\bootstrap5\Html;

?>

<div class="card" style="width: 26rem;">
  <img src="/img/<?= $model->img ?? Doctor::NO_IMG ?>"  class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= Html::encode($model->name) ?></h5>
    <h6 class="card-text">Опыт работы: <?= Html::encode($model->experience) ?> лет</h6>
    <h6 class="card-text">Образование: <?= Html::encode($model->education) ?></h6>
    <h6 class="card-text">Специализация: <?= Html::encode($model->specialization) ?></h6>
    <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary w-100']) ?>
    <?= !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin 
        ? Html::a('Записаться на прием', ['/account/application/create', 'doctor_id' => $model->id], ['class' => 'btn btn-outline-primary w-100 mt-2']) 
        : '' 
    ?>
  </div>
</div>