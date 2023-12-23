<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */

$this->title = 'Create Bowl';
$this->params['breadcrumbs'][] = ['label' => 'Bowls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bowl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
