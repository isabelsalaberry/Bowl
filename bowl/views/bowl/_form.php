<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bowl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carrinho_id')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
