<?php

namespace app\controllers;

use app\models\Bowl;
use app\models\Carrinho;
use app\models\Cliente;
use app\models\IngredienteBowl;
use app\models\IngredienteRefeicao;
use app\models\Mensagem;
use app\models\Refeicao;
use app\models\Restaurante;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'homepage';

        if(Restaurante::findOne(1) === null) {
            $rest = new Restaurante();
            $rest->nome = "Bowl.";
            $rest->save();
        }


        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        /*if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';*/
        return $this->render('login', [
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    /*public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }*/

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new Mensagem();
        $model->restaurante_id = 1;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['contact']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays Ingredientes do Dia page.
     *
     * @return string
     */
    public function actionFazerPedido()
    {
        $cliente_id = 1;

        $refeicao_dia = Refeicao::temRefeicaoHoje();
        $ingredientes_refeicao = null;
        if($refeicao_dia!=null) {
            $ingredientes_refeicao = IngredienteRefeicao::find()->where(['refeicao_id' => $refeicao_dia->id])->all();
        }

        $carrinho = Carrinho::find()->where(['cliente_id' => $cliente_id])->one();
        if($carrinho === null) {
            $carrinho = new Carrinho();
            $carrinho->limparCarrinho($cliente_id);
            if($carrinho->validate()) {
                $carrinho->save();
            }
        }

        return $this->render('fazer-pedido', [
            'ingredientes_refeicao' => $ingredientes_refeicao,
            'refeicao_dia' => $refeicao_dia
        ]);
    }
}
