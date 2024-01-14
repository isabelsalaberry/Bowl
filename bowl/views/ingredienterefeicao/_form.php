<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IngredienteRefeicao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingrediente-refeicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'refeicao_id')->textInput() ?>

    <?= $form->field($model, 'ingrediente_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
