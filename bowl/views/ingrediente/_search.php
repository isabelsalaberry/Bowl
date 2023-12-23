<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IngredienteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingrediente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'categoria_id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'preco_g') ?>

    <?php // echo $form->field($model, 'calorias_g') ?>

    <?php // echo $form->field($model, 'carboidrato_g') ?>

    <?php // echo $form->field($model, 'acucar_g') ?>

    <?php // echo $form->field($model, 'proteina_g') ?>

    <?php // echo $form->field($model, 'sodio_g') ?>

    <?php // echo $form->field($model, 'gordura_g') ?>

    <?php // echo $form->field($model, 'gordura_saturada_g') ?>

    <?php // echo $form->field($model, 'fibras_g') ?>

    <?php // echo $form->field($model, 'gluten') ?>

    <?php // echo $form->field($model, 'lactose') ?>

    <?php // echo $form->field($model, 'vegan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
