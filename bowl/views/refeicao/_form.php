<?php

use kartik\datetime\DateTimePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Refeicao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="refeicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'data')->widget(DateTimePicker::classname(), [
        'language' => 'pt',
        'layout' => '{picker}{input}{remove}',
        'options' => ['placeholder' => Yii::t('app','Escolha a data...')],
        'pluginOptions' => [
            'minView' => 2, // Não mostra seletor de hora
            'format' => 'yyyy-mm-dd',
            'autoclose' => true
        ]
    ])->label(Yii::t('app',"Data da Refeição"))
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderIngredientes,
        'filterModel' => $searchModelIngredientes,
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            [

                'attribute' => 'image_path',

                'format' => 'html',

                'label' => 'Imagem',

                'value' => function ($data) {

                    return Html::img($data->image_path,

                        ['width' => '80px']);

                },

            ],
            ['label'=>'Categoria',
            'value' => function ($data) {
                 return \app\models\CategoriaIngrediente::findOne(['id'=>$data->categoria_id])->nome;
            }],
            'nome',
            'preco_g',

            [
                'class' => 'yii\grid\CheckboxColumn',
                // you may configure additional properties here
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    var keys = $('#grid').yiiGridView('getSelectedRows');
</script>
