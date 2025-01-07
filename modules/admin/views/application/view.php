<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Status;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = "Обращение №$model->id от $model->create_at";
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-outline-info']) ?>
        <?= $model->status_id == Status::getStatusId('Новый') ? Html::a('Одобрить', ['verify', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) : '' ?>
        <?= $model->status_id == Status::getStatusId('Новый') || $model->status_id == Status::getStatusId('Одобрен') 
            ? Html::a('Отменить', ['cancel', 'id' => $model->id], ['class' => 'btn btn-outline-danger']) 
            : '' 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'doctor_id',
                'value' => $model->doctor->name,
            ],
            [
                'attribute' => 'complaints_id',
                'value' => $model->complaints?->title,
                'visible' => (bool)$model->complaints,
            ],
            'description',
            [
                'attribute' => 'comment',
                'value' => $model->comment,
                'visible' => (bool)$model->comment,
            ],
            [
                'attribute' => 'user_id',
                'value' => $model->user->name,
            ],
            [
                'attribute' => 'status_id',
                'value' => $model->status->title,
            ],
            'create_at',
            [
                'attribute' => 'comment_admin',
                'value' => $model->comment_admin,
                'visible' => (bool)$model->comment_admin,
            ],
            'date',
            'time',
        ],
    ]) ?>

</div>
