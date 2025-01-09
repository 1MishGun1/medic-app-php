<?php

use app\models\Doctor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DoctorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Наши врачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-between">
        <div>
            <?= $dataProvider->sort->link('name', ['class' => 'btn btn-outline-warning']) ?> | <?= 
                $dataProvider->sort->link('experience', ['class' => 'btn btn-outline-info']) ?>
        </div>
        <div class="d-flex">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?php Pjax::begin(); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => "<div class=\"d-flex justify-content-center flex-wrap gap-3\">{items}</div>",
        'itemView' => 'item',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
