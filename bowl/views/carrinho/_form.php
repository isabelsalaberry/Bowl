<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Carrinho $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carrinho-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_id')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calorias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carboidratos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acucares')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proteinas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sodios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gorduras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gorduras_saturadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fibras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gluten')->textInput() ?>

    <?= $form->field($model, 'lactose')->textInput() ?>

    <?= $form->field($model, 'vegan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
