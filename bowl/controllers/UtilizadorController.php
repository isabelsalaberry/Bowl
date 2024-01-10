<?php

namespace app\controllers;

use amnah\yii2\user\controllers\DefaultController as UserController;
use app\models\Cliente;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UtilizadorController extends UserController
{

    public function actionIndex()
    {
        // Your custom code for the index action
        return parent::actionIndex();
    }

    public function actionLogin()
    {
        // Your custom code for the index action
        return parent::actionLogin();
    }

    public function actionRegister()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */
        /** @var \amnah\yii2\user\models\Role $role */

        // set up new user/profile objects
        $user = $this->module->model("User", ["scenario" => "register"]);
        $profile = $this->module->model("Profile");
        $modelCliente = new Cliente();

        // load post data
        $post = Yii::$app->request->post();
        if ($user->load($post)) {

            // ensure profile data gets loaded
            $profile->load($post);

            // validate for ajax request
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user, $profile);
            }

            // validate for normal request
            if ($user->validate() && $profile->validate()) {

                // perform registration
                $role = $this->module->model("Role");
                $user->setRegisterAttributes($role::ROLE_USER)->save();
                $profile->setUser($user->id)->save();
                $this->afterRegister($user);

                if($modelCliente->load($post)) {
                    if($modelCliente->validate()) {
                        $modelCliente->user_id = $user->id;
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

        //return $this->render("register", compact("user", "profile"));

        return $this->render('register', [
            'modelCliente' => $modelCliente,
            compact("user", "profile")
        ]);
    }

}