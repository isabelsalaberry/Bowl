<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoriaIngrediente $model */

$this->title = 'Update Categoria Ingrediente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Ingredientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-ingrediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
