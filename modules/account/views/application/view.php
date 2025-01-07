<?php

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = "Обращение №$model->id от $model->create_at";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= $model->status_id == Status::getStatusId('Новый') ? Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : '' ?>
        <?= $model->status_id == Status::getStatusId('Новый') ? Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить данную заявку?',
                'method' => 'post',
            ],
        ]) : '' ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'doctor_id',
                'value' => $model->doctor->name,
            ],
            [
                'attribute' => 'complaints_id',
                'value' => $model->complaints?->title,
                'visible' => (bool)$model->complaints,
            ],
            'description:ntext',
            [
                'attribute' => 'comment',
                'value' => $model->comment,
                'visible' => (bool)$model->comment,
            ],
            [
                'attribute' => 'status_id',
                'value' => $model->status->title,
            ],
            'create_at',
            [
                'attribute' => 'comment_admin:ntext',
                'value' => $model->comment_admin,
                'visible' => (bool)$model->comment_admin,
            ],
            'date',
            'time',
        ],
    ]) ?>

</div>
