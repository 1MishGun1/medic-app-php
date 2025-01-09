<?php

use app\models\Doctor;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Doctor $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список врачей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить врача из системы?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'experience',
            'education',
            'specialization',
            [
                'attribute' => 'img',
                'value' => Html::img('/img/' . ($model->img ?? Doctor::NO_IMG), ['class' => 'w-50']),
                'format' => 'html'
            ]
        ],
    ]) ?>

</div>
