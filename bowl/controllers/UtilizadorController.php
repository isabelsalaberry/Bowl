<?php

namespace app\controllers;

use amnah\yii2\user\controllers\DefaultController;
use app\models\Cliente;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UtilizadorController extends DefaultController
{
    public function actionIndex()
    {
        $this->module = Yii::$app->getModule("user");
        // Your custom code for the index action
        return parent::actionIndex();
    }

    public function actionLogin()
    {
        $this->module = Yii::$app->getModule("user");
        // Your custom code for the index action
        return parent::actionLogin();
    }

    public function actionRegister()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */
        /** @var \amnah\yii2\user\models\Role $role */

        $this->module = Yii::$app->getModule("user");
        // set up new user/profile objects
        $user = $this->module->model("User", ["scenario" => "register"]);
        $modelCliente = new Cliente();

        // load post data
        $post = Yii::$app->request->post();
        if ($user->load($post)) {

            // validate for normal request
            if ($user->validate()) {

                // perform registration
                $user->setRegisterAttributes(2)->save();
                $profile->setUser($user->id)->save();
                $this->afterRegister($user);

                if($modelCliente->load($post)) {
                    if($modelCliente->validate()) {
                        $modelCliente->user_id = $user->id;
                        $modelCliente->save();
                    }
                }

                // set flash
                // don't use $this->refresh() because user may automatically be logged in and get 403 forbidden
                $successText = Yii::t("user", "Successfully registered [ {displayName} ]", ["displayName" => $user->getDisplayName()]);
                $guestText = "";
                if (Yii::$app->user->isGuest) {
                    $guestText = Yii::t("user", " - Please check your email to confirm your account");
                }
                Yii::$app->session->setFlash("Register-success", $successText . $guestText);
            }
        }
        return $this->render('/utilizador/register', [
            'modelCliente' => $modelCliente,
            'user' => $user,
            'module' => $this->module
        ]);
    }

}