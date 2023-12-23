<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarrinhoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carrinho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'calorias') ?>

    <?= $form->field($model, 'carboidratos') ?>

    <?php // echo $form->field($model, 'acucares') ?>

    <?php // echo $form->field($model, 'proteinas') ?>

    <?php // echo $form->field($model, 'sodios') ?>

    <?php // echo $form->field($model, 'gorduras') ?>

    <?php // echo $form->field($model, 'gorduras_saturadas') ?>

    <?php // echo $form->field($model, 'fibras') ?>

    <?php // echo $form->field($model, 'gluten') ?>

    <?php // echo $form->field($model, 'lactose') ?>

    <?php // echo $form->field($model, 'vegan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
