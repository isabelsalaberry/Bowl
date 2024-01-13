<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->registerCssFile('@web/css/site.css');

/** @var yii\web\View $this */
/** @var app\models\ClienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fazer Pedido';
?>

<div class="fazer-pedido">
    <div class="row">
        Inserir tutorial aqui, com a fonte do site e etc :)
    </div>

    <?php if($ingredientes_refeicao != null) { ?>

    <h2>Ingredientes de hoje!</h2>

    <div class="row">
        <?php
        foreach($ingredientes_refeicao as $ing_ref) {
            $ingrediente = \app\models\Ingrediente::findOne($ing_ref->ingrediente_id);
            ?>
            <div class="col-sm-4 text-center">
                <img src="<?php echo $ingrediente->image_path ?>" style="justify-content: center" width="250" height="250" alt>
                <h5 class="p-3" style="font-family: Hey Comic; font-weight: normal; font-style: normal;"> <?php echo $ingrediente->nome; ?>
                </h5>
            </div>
        <?php }
        ?>
    </div>

    <p>
        <?= Html::a('Criar Bowl.', ['/bowl/create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php }
    else { ?>
        <div class="row">
            <h2>
                Não há refeição disponível para o dia de hoje!
            </h2>
        </div>
    <?php } ?>

</div>
