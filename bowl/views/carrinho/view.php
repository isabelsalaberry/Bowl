<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Carrinho $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cliente_id',
            'preco',
            'calorias',
            'carboidratos',
            'acucares',
            'proteinas',
            'sodios',
            'gorduras',
            'gorduras_saturadas',
            'fibras',
            'gluten',
            'lactose',
            'vegan',
        ],
    ]) ?>

</div>
