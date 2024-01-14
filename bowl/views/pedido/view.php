<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Pedido $model */

$this->registerCssFile('@web/css/tables.css');
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">
    <?php Pjax::begin(); ?>
    <h3 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Pedido #<?php echo $model->id; ?></h3>

    <div class="row text-center">
        <?php
        foreach($bowls as $bowl) {
            $bowlIng = \app\models\IngredienteBowl::find()->where(['bowl_id' => $bowl->id])->all(); ?>
            <h3 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Bowl.</h3>
            <?= GridView::widget([
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => $bowlIng,
                    'pagination' => false,
                ]),
                'summary' => '',
                'tableOptions' => ['class' => 'table table-striped'],
                'columns' => [
                    [
                        'attribute' => 'image_path',
                        'format' => 'html',
                        'label' => 'Imagem',
                        'value' => function ($data) {
                            return Html::img($data->ingRef->ingrediente['image_path'],
                                ['width' => '80px']);
                        },
                    ],
                    ['label'=> 'Categoria',
                        'value' => function ($data) {
                            return \app\models\CategoriaIngrediente::findOne(['id'=>$data->ingRef->ingrediente->categoria_id])->nome;
                        }],
                    ['label' => 'Nome',
                        'value' => function ($data) {
                            return $data->ingRef->ingrediente->nome;
                        }],
                    ['label' => 'Quantidade',
                        'value' => function ($data) {
                            return $data->quantidade;
                        }],
                ],
            ]); ?>
            <br>
        <?php } ?>
        <h3 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Espere alguns minutos e seu pedido estará em sua casa!.</h3>
    </div>



    <?php Pjax::end(); ?>

</div>