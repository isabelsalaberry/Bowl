<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IngredienteRefeicao $model */

$this->title = 'Update Ingrediente Refeicao: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ingrediente Refeicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingrediente-refeicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
