<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mensagem $model */
$this->registerCssFile('@web/css/tables.css');
$this->title = 'Create Mensagem';
$this->params['breadcrumbs'][] = ['label' => 'Mensagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
