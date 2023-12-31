<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

// Registro do arquivo CSS
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/contactos.css');

?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Container infos de localização -->
    <div class="container-fluid" style="background-color: #E6294F;">
        <div class="page-wrapper" style="border-style: none;">
            <div class="row p-0" style="background-color: #E6294F;">

                <!-- Texto -->
                <div class="col-sm-6">
                    <div class="container text-center my-4" style="padding-left: 12%;">
                        <h2 style="margin-top: 20%; font-family: Hey Comic; font-weight: normal; font-style: normal; text-align: left;">Informações de Contacto</h2>
                        <h6 style="font-weight: lighter; text-align: left; margin-bottom: 12%;">
                            Telefone: (+351) 000 000 000<br>
                            Endereço: Rua dos Bowls, 000<br>
                            E-mail: bowl@ipb.pt
                        </h6>
                    </div>
                </div>

                <!-- Mapa do IPB -->
                <div class="col-sm-6 d-flex" style="margin-top: 6%; margin-bottom: 6%; justify-content: center;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11897.616632455503!2d-6.763110624096684!3d41.79805320943541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2spt!4v1700479449734!5m2!1spt-BR!2spt" width="60%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Container form -->
    <div class="page-wrapper" style="border-style: none;">

        <div class="container text-center my-4">
            <h2 style="margin-top: 12%; margin-bottom: 80px; font-family: Hey Comic; font-weight: normal; font-style: normal;">Formulário para Contacto</h2>
        </div>

        <?php $form = ActiveForm::begin(); ?>

        <div class="container text-center my-4">
            <?= $form->field($model, 'nome_cliente')->textInput(['style' => 'background-color: #EAD9BF; border: none;']) ?>
        </div>

        <div class="container text-center my-4">
            <?= $form->field($model, 'email')->textInput(['style' => 'background-color: #EAD9BF; border: none;']) ?>
        </div>

        <div class="container text-center my-4">
            <?= $form->field($model, 'msg')->textarea(['rows' => 6, 'style' => 'background-color: #EAD9BF; border: none;']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
