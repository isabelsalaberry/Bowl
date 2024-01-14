<?php

namespace app\controllers;

use app\models\Bowl;
use app\models\Carrinho;
use app\models\Cliente;
use app\models\IngredienteBowl;
use app\models\Pedido;
use app\models\PedidoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index-cliente', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin', 'cliente'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Pedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        if(\Yii::$app->user->can("admin")) {
            $dataProvider = $searchModel->search($this->request->queryParams);
        }
        else {
            $dataProvider = $searchModel->searchCliente($this->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Pedido::findOne($id);
        $bowls = Bowl::find()->where(['pedido_id' => $id])->all();

        return $this->render('view', [
            'model' => $model,
            'bowls' => $bowls,
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($carrinho_id)
    {
        $carrinho = Carrinho::findOne($carrinho_id);
        $model = new Pedido();
        $model->restaurante_id = 1;
        $model->carrinho_id = $carrinho->id;
        $cliente = Cliente::getClienteUser();
        $model->cliente_id = $cliente->id;
        if($model->validate()) {
            $model->save();
        }
        $bowls_carrinho = Bowl::find()->where(['carrinho_id' => $carrinho->id])->all();

        foreach($bowls_carrinho as $bowl) {
            $bowl->carrinho_id = null;
            $bowl->pedido_id = $model->id;
            $bowl->save();
        }

        $preco = $carrinho->preco;

        $carrinho->limparCarrinho($cliente->id);
        $carrinho->save();


        return $this->render('view', [
            'model' => $this->findModel($model->id),
            'bowls' => $bowls_carrinho,
            'preco' => $preco
        ]);
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
