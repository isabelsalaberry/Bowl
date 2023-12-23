<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IngredienteRefeicao $model */

$this->title = 'Create Ingrediente Refeicao';
$this->params['breadcrumbs'][] = ['label' => 'Ingrediente Refeicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-refeicao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
