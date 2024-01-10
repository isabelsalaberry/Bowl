<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\BootstrapAsset;

BootstrapAsset::register($this);

// Registro do arquivo CSS
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/sobre-nos.css', ['depends' => [BootstrapAsset::class]]);
?>

<<<<<<< HEAD
<div class="page-wrapper">
    <div class="container text-center">
        <h2 style="margin-bottom: 80px; font-family: Hey Comic; font-weight: normal; font-style: normal;">Prazer em conhecê-lo!</h2>
=======

<div class="container text-center my-4">
    <h2 style="margin-bottom: 80px; font-family: Hey Comic; font-weight: normal; font-style: normal;">Prazer em conhecê-lo!</h2>
</div>

<div class="row">
    <div class="col-sm-7">
        <h1 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Davi Silva Eleutério</h1>
        <p>Técnico em Automação Industrial e estudante dedicado de Engenharia Informática, tem interesse principalmente pela área de Desenvolvimento Web, portanto muito entusiasmado com esse projeto.</p>
>>>>>>> 196c7bd1b0f7fddf27c7e3e96f3d6d0d9e96b80c
    </div>

    <div class="row">
        <div class="col-sm-7">
            <h1 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Davi Silva Eleutério</h1>
            <p>Técnico em Automação Industrial e estudante dedicado de Engenharia Informática, tem interesse principalmente pela área de Desenvolvimento Web, portanto muito entusiasmado com esse projeto.</p>
        </div>
        <div class="col-sm-5" style="display: flex!important; justify-content: flex-end;">
            <?= Html::img('@web/imagens/davi.jfif', ['class' => 'img-creators', 'alt' => 'Imagem', 'style' => 'margin-bottom: 20px;']) ?>
        </div>
    </div>

    <div class="row" style="margin-top: 40px">
        <div class="col-sm-5">
            <?= Html::img('@web/imagens/isabel.jpg', ['class' => 'img-creators', 'alt' => 'Imagem', 'style' => 'margin-bottom: 20px;']) ?>
        </div>
        <div class="col-sm-7">
            <h1 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Isabel Irigon Salaberry</h1>
            <p>Estudante de Engenharia Informática, amante de design e disciplinas com potencial criativo. Aspirante a front-end empenhada em fazer o melhor possível no projeto de DW.</p>
        </div>
    </div>
</div>
