<?php

use app\models\Carrinho;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CarrinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/tables.css');
$this->registerCssFile('@web/css/site.css');
$this->registerCssFile('@web/css/ingredientes-do-dia.css');
$this->title = 'Carrinho';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="carrinho-index">
    <?php Pjax::begin(); ?>

    <div class="row">
        <div class="col-sm-7">
            <?php
            foreach($bowls_carrinho as $bowl) {
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
                            'label' => false,
                            'value' => function ($data) {
                                return Html::img($data->ingRef->ingrediente['image_path'],
                                    ['width' => '80px']);
                            },
                        ],
                        ['label'=> false,
                            'value' => function ($data) {
                                return \app\models\CategoriaIngrediente::findOne(['id'=>$data->ingRef->ingrediente->categoria_id])->nome;
                            }],
                        ['label' => false,
                            'value' => function ($data) {
                                return $data->ingRef->ingrediente->nome;
                            }],
                    ],
                ]); ?>
                <br>
            <?php } ?>

        </div>

        <div class="col-sm-5" style="background-color: #9AB21C">
            <h3 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Carrinho.</h3>
            <div class="container-table-stripped p-2">
                <h5 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Informações Nutricionais</h5>
                <table class="table table-sm table-striped">
                    <tbody>
                    <tr>
                        <td scope="row">Calorias</td>
                        <th> <?php echo $carrinho->calorias ?> Kcal</th>
                    </tr>
                    <tr>
                        <td scope="row">Carboidratos</td>
                        <th><?php echo $carrinho->carboidratos ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Gorduras</td>
                        <th><?php echo $carrinho->gorduras ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Gorduras Saturadas</td>
                        <th><?php echo $carrinho->gorduras_saturadas ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Proteínas</td>
                        <th><?php echo $carrinho->proteinas ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Fibras</td>
                        <th><?php echo $carrinho->fibras ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Açúcares</td>
                        <th><?php echo $carrinho->acucares ?> g</th>
                    </tr>
                    <tr>
                        <td scope="row">Sódios</td>
                        <th><?php echo $carrinho->sodios ?> g</th>
                    </tr>
                    </tbody>
                </table>

                <div class="form-check" style="background-color: #9AB21C;">
                    <input class="form-check-input" type="checkbox" value="" id="gluten" <?php if($carrinho->gluten==1) echo "checked" ?> disabled>
                    <label class="form-check-label" for="flexCheckDisabled">
                        Glúten
                    </label>
                </div>

                <div class="form-check" style="background-color: #9AB21C;">
                    <input class="form-check-input" type="checkbox" value="" id="lactose" <?php if($carrinho->lactose==1) echo "checked" ?> disabled>
                    <label class="form-check-label" for="flexCheckDisabled">
                        Lactose
                    </label>
                </div>

                <div class="form-check" style="background-color: #9AB21C;">
                    <input class="form-check-input" type="checkbox" value="" id="vegan" <?php if($carrinho->vegan==1) echo "checked" ?> disabled>
                    <label class="form-check-label" for="flexCheckDisabled">
                        Vegan
                    </label>
                </div>
            </div>

            <div class="row" style="min-width: 100%; padding-right: 12%; padding-left: 12%; padding-top: 15px;">
                <div class="col-lg-6">
                    <h5 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Finalizar Pedido: </h5>
                </div>
                <div class="col-lg-3">
                    <h5><?php echo $carrinho->preco ?> €</h5>
                </div>
                <div class="col-lg">
                    <?= Html::a('<i class="bi bi-arrow-right"></i>', ['/pedido/create'], ['class' => 'btn-finish float-end', 'style' => 'display: flex; justify-content: center']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php Pjax::end(); ?>

</div>
