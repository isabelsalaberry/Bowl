<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */

$this->title = 'Update Bowl: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bowls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bowl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
