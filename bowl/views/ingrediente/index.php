<?php

use app\models\Ingrediente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\IngredienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/tables.css');
$this->title = 'Ingredientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ingrediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            [

                'attribute' => 'image_path',

                'format' => 'html',

                'label' => 'Imagem',

                'value' => function ($data) {

                    return Html::img($data['image_path'],

                        ['width' => '80px']);

                },

            ],
            ['label'=>'Categoria',
                'value' => function ($data) {
                    return \app\models\CategoriaIngrediente::findOne(['id'=>$data->categoria_id])->nome;
                }],
            'nome',
            'descricao',
            'preco_g',
            //'calorias_g',
            //'carboidrato_g',
            //'acucar_g',
            //'proteina_g',
            //'sodio_g',
            //'gordura_g',
            //'gordura_saturada_g',
            //'fibras_g',
            //'gluten',
            //'lactose',
            //'vegan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ingrediente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
