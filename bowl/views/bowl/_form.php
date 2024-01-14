<?php

use kartik\number\NumberControl;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/css/tables.css');

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bowl-form">

    <div class="row text-center">
        <h1 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Escolha os ingredientes do seu Bowl. e insira as quantidades!</h1>
    </div>

    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $ingredientes_bowl,
            'pagination' => false,
        ]),
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            [
                'attribute' => 'image_path',
                'format' => 'html',
                'label' => 'Imagem',
                'value' => function ($data) {
                    return Html::img($data->ingRef->ingrediente->image_path,
                        ['width' => '80px']);
                },
            ],
            ['label'=>'Categoria',
                'value' => function ($data) {
                    return $data->ingRef->ingrediente->categoria->nome;
                }],
            ['label' => 'Nome',
                'value' => function ($data) {
                    return $data->ingRef->ingrediente->nome;
                }],
            ['label' => 'Preço (g)',
                'value' => function ($data) {
                    return $data->ingRef->ingrediente->preco_g;
                }],
            [
                'attribute' => 'quantidade',
                'value' => function ($data) use ($form) {
                    return $form->field($data, "[$data->ing_ref_id]quantidade")->label(false)->widget(NumberControl::classname(), [
                        'maskedInputOptions' => [
                            'suffix' => ' g',
                            'groupSeparator' => '.',
                            'radixPoint' => ',',
                            'allowMinus' => false,
                            'rightAlign' => false,
                            'digits' => 2
                        ],
                    ]);
                },
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($data, $key, $index, $column) {
                    return ['value' => $data->ing_ref_id];
                },
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Adicionar ao Carrinho', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
