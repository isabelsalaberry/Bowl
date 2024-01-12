<?php

use app\models\IngredienteBowl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\IngredienteBowlSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ingrediente Bowls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-bowl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ingrediente Bowl', ['create'], ['class' => 'btn btn-success']) ?>
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
            'ing_ref_id',
            'bowl_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, IngredienteBowl $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
