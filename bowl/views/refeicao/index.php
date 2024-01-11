<?php

use app\models\Refeicao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\RefeicaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/tables.css');
$this->title = 'Refeições';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refeicao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Refeições', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'estilo-tabelas'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data',
            'restaurante_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Refeicao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
