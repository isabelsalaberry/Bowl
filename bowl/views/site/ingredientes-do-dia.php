<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */

$this->registerCssFile(Yii::$app->request->baseUrl . '/css/ingredientes-do-dia.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/bowl.css');

$this->title = 'Ingredientes do Dia';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="row" style="margin-right: 0px!important;">
    <div class="col-sm-8 p=0 text-center">
        <div class="row">
            <div class="col-sm-4">
                <img src="/imagens/arroz-integral.jpg" class="rounded mx-auto d-block" width="225" height="225" alt="...">
                <h5 class="p-3" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Arroz Integral
                    <button type="button" class="btn-add"  data-bs-toggle="modal" data-bs-target="#arrozIntegralModal">
                        <i class="bi bi-cart-plus-fill"></i>
                    </button>
                </h5>
                <div class="modal fade" id="arrozIntegralModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content default-bg">
                            <div class="modal-header" style="border-bottom: none; padding-bottom: 0px;">
                                <button class="btn-modal default-bg" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    <h2><i class="bi bi-arrow-left"></i></h2>
                                </button>
                            </div>
                            <div class="modal-body" style="padding-top: 0px;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="container">
                                            <h1 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Arroz Integral.</h1>
                                            <p class="text-center">
                                                No coração de nossos pratos está o Arroz Integral Premium, proporcionando uma textura suave e sabor delicado.
                                                Sua qualidade excepcional destaca-se, garantindo um toque distintivo à autenticidade de nossa cozinha.
                                            </p>
                                            <div class="container-table-stripped">
                                                <h5 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">tabela nutricional</h5>
                                                <table class="table table-sm table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td scope="row">Calorias</td>
                                                        <th>124 Kcal</th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Carboidratos</td>
                                                        <th>25,80 g</th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Proteínas</td>
                                                        <th>2,60 g</th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Lipídeos</td>
                                                        <th>1,00 g</th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Fibras</td>
                                                        <th>2,70 g</th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Sódio</td>
                                                        <th>1,00 mg</th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="container">
                                            <img src="/imagens/arroz-integral.jpg" class="rounded mx-auto d-block" width="350" height="350" alt="...">
                                            <button class="btn-add-bowl" type="button" data-bs-dismiss="modal" aria-label="Close" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Adicionar ao Bowl.</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-4 carrinho">
        <div class="container" style="padding-top: 20px;">
            <div class="row">
                <h3 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Carrinho</h3>
            </div>
            <div class="container" style="padding: 10px;">
                <h4 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">
              <span class="badge badge-bowl">
                <i class="bi bi-basket2-fill"></i>
              </span>
                    Bowl. da Joana
                </h4>

                <table class="table-light container" style="padding-top: 10px;">

                    <thead>
                    <tr>
                        <th scope="col-sm-1">#</th>
                        <th scope="col-sm-8">Ingrediente</th>
                        <th scope="col-sm-1">Quantidade</th>
                        <th scope="col-sm-1">Un.</th>
                        <th scope="col-sm-1"><i class="bi bi-cash-coin"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Salada Verde</td>
                        <td>
                            <input type="text" class="input-carrinho" placeholder="Qtd.">
                        </td>
                        <td>
                            <span id="inputGroup-sizing-sm">g</span>
                        </td>
                        <td>1 €</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Arroz Branco</td>
                        <td>
                            <input type="text" class="input-carrinho" placeholder="Qtd.">
                        </td>
                        <td>
                            <span id="inputGroup-sizing-sm">g</span>
                        </td>
                        <td>2 €</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Feijão Preto</td>
                        <td>
                            <input type="text" class="input-carrinho" placeholder="Qtd.">
                        </td>
                        <td>
                            <span id="inputGroup-sizing-sm">g</span>
                        </td>
                        <td>3 €</td>
                    </tr>
                    </tbody>
                </table>

                <div class="row" style="padding-top: 10px;">
                    <div class="col-sm-10">
                        <h4>Total:</h4>
                    </div>
                    <div class="col-sm-2">
                        <h5>7 €</h5>
                    </div>
                </div>


                <div class="container-table-stripped p-2">
                    <h5 class="text-center" style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Informações Nutricionais</h5>
                    <table class="table table-sm table-striped">
                        <tbody>
                        <tr>
                            <td scope="row">Lipídeos</td>
                            <th>7,52 g</th>
                        </tr>
                        <tr>
                            <td scope="row">Carboidratos</td>
                            <th>59,48 g</th>
                        </tr>
                        <tr>
                            <td scope="row">Proteínas</td>
                            <th>16,56 g</th>
                        </tr>
                        <tr>
                            <td scope="row">Calorias</td>
                            <th>377 Kcal</th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="form-check" style="background-color: #9AB21C;">
                        <input class="form-check-input" type="checkbox" value="" id="gluten" checked disabled>
                        <label class="form-check-label" for="flexCheckDisabled">
                            Glúten
                        </label>
                    </div>

                    <div class="form-check" style="background-color: #9AB21C;">
                        <input class="form-check-input" type="checkbox" value="" id="lactose" disabled>
                        <label class="form-check-label" for="flexCheckDisabled">
                            Lactose
                        </label>
                    </div>

                    <div class="form-check" style="background-color: #9AB21C;">
                        <input class="form-check-input" type="checkbox" value="" id="acucar" checked disabled>
                        <label class="form-check-label" for="flexCheckDisabled">
                            Açúcar
                        </label>
                    </div>
                </div>

                <h5 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">
                    <button class="btn-bowl" id="add-bowl">
                        <i class="bi bi-plus"></i>
                    </button>
                    Adicionar Bowl.
                </h5>

            </div>
        </div>


        <div class="row" style="min-width: 100%; padding-right: 12%; padding-left: 12%; padding-top: 15px;">
            <div class="col-lg-6">
                <h5 style="font-family: Hey Comic; font-weight: normal; font-style: normal;">Finalizar Pedido: </h5>
            </div>
            <div class="col-lg-2">
                <h5>7€</h5>
            </div>
            <div class="col-lg">
                <button class="btn-finish float-end">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
