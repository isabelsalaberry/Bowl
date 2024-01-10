<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Mensagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mensagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'restaurante_id')->textInput() ?>

    <?= $form->field($model, 'nome_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'msg')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
