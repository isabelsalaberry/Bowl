<?php

use app\models\CategoriaIngrediente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CategoriaIngredienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/tables.css');
$this->title = 'Categoria Ingredientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-ingrediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria Ingrediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CategoriaIngrediente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
