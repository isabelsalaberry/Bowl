<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refeicao $model */
$this->registerCssFile('@web/css/tables.css');
$this->title = 'Criar Refeicao';
$this->params['breadcrumbs'][] = ['label' => 'Refeições', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refeicao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderIngredientes' => $dataProviderIngredientes,
        'searchModelIngredientes' => $searchModelIngredientes
    ]) ?>

</div>
