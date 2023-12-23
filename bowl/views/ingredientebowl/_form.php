<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IngredienteBowl $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingrediente-bowl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ing_ref_id')->textInput() ?>

    <?= $form->field($model, 'bowl_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
