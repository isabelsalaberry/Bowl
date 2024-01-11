<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\User $profile
 * @var app\models\Cliente $modelCliente
 * @var string $userDisplayName
 */

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-register">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($user, 'username') ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>

    <?= $form->field($modelCliente, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCliente, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCliente, 'telemovel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCliente, 'morada')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>

            <br/><br/>
            <?= Html::a(Yii::t('user', 'Login'), ["/utilizador/login"]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>