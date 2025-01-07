<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_admin')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отменить заявку', ['class' => 'btn btn-outline-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
