<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refeicao $model */

$this->title = 'Atualizar Refeição: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Refeicaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refeicao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderIngredientes' => $dataProviderIngredientes,
        'searchModelIngredientes' => $searchModelIngredientes
    ]) ?>

</div>
