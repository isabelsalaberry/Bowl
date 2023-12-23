<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ingrediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingrediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calorias_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carboidrato_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acucar_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proteina_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sodio_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gordura_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gordura_saturada_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fibras_g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gluten')->textInput() ?>

    <?= $form->field($model, 'lactose')->textInput() ?>

    <?= $form->field($model, 'vegan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
