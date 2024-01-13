<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bowl $model */

$this->title = 'Criar Bowl.';
?>
<div class="bowl-create">

    <?= $this->render('_form', [
        'ingredientes_bowl' => $ingredientes_bowl,
    ]) ?>

</div>
