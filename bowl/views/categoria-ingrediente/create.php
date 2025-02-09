<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoriaIngrediente $model */
$this->registerCssFile('@web/css/tables.css');
$this->title = 'Create Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-ingrediente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
