<?php

use kartik\number\NumberControl;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$array = array(1 => "Sim", 0 => "Não");

/** @var yii\web\View $this */
/** @var app\models\Ingrediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingrediente-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'categoria_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\CategoriaIngrediente::find()->asArray()->all(), 'id', 'nome'), ['prompt' => Yii::t('app', '-- Selecionar Categoria --')]);
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'preco_g')->label(\Yii::t('app','Preço (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'calorias_g')->label(\Yii::t('app','Calorias (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'carboidrato_g')->label(\Yii::t('app','Carboidratos (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'acucar_g')->label(\Yii::t('app','Açúcares (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'proteina_g')->label(\Yii::t('app','Proteínas (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'sodio_g')->label(\Yii::t('app','Sódio (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'gordura_g')->label(\Yii::t('app','Gorduras (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'gordura_saturada_g')->label(\Yii::t('app','Gorduras Saturadas (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'fibras_g')->label(\Yii::t('app','Fibras (g)'))->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'suffix' => ' g',
            'groupSeparator' => '.',
            'radixPoint' => ',',
            'allowMinus' => false,
            'rightAlign' => false,
            'digits' => 2
        ],
    ]); ?>

    <?= $form->field($model, 'gluten')->widget(Select2::classname(), [
                    'data' => $array,
                    'language' => 'pt',
                    'options' => [
                        'placeholder' => \Yii::t('app','Selecione se o Ingrediente tem Glúten'),
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(\Yii::t('app',"Glúten")); ?>


    <?= $form->field($model, 'lactose')->widget(Select2::classname(), [
        'data' => $array,
        'language' => 'pt',
        'options' => [
            'placeholder' => \Yii::t('app','Selecione se o Ingrediente tem Lactose'),
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(\Yii::t('app',"Lactose")); ?>

    <?= $form->field($model, 'vegan')->widget(Select2::classname(), [
        'data' => $array,
        'language' => 'pt',
        'options' => [
            'placeholder' => \Yii::t('app','Selecione se o Ingrediente é Vegan'),
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(\Yii::t('app',"Vegan")); ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
