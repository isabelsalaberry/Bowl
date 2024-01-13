<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */

$this->title = 'Atualizar Bowl.: ' . $model->id;
?>
<div class="bowl-update">

    <?= $this->render('_form', [
        'ingredientes_bowl' => $ingredientes_bowl,
    ]) ?>

</div>
