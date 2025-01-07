<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\YiiAsset;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php Pjax::begin([
        'id' => 'form-pjax',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]) ?>

    <?php $form = ActiveForm::begin([
        'id' => 'form-application'
    ]); ?>

    <?= $form->field($model, 'doctor_id')->dropDownList($nameDoctor, ['prompt' => 'Выберите доктора']) ?>

    <?= $form->field($model, 'complaints_id')->dropDownList($titleComplaint, ['prompt' => 'Выберите жалобу', 'disabled' => (bool)$model->check]) ?>

    <?= $form->field($model, 'check')->checkbox() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'disabled' => !(bool)$model->check]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date', 'min' => date('Y-m-d'), 'value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'time')->textInput(['type' => 'time', 'min' => '08:00', 'max' => '19:00']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end(); ?>

</div>

<?php
    $this->registerJsFile('/js/check.js', ['depends' => YiiAsset::class]);
?>
