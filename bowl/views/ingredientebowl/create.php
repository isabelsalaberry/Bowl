<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IngredienteBowl $model */

$this->title = 'Create Ingrediente Bowl';
$this->params['breadcrumbs'][] = ['label' => 'Ingrediente Bowls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-bowl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
