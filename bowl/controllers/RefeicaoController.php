<?php

namespace app\controllers;

use app\models\Ingrediente;
use app\models\IngredienteRefeicao;
use app\models\IngredienteSearch;
use app\models\Refeicao;
use app\models\RefeicaoSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefeicaoController implements the CRUD actions for Refeicao model.
 */
class RefeicaoController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];

    }

    /**
     * Lists all Refeicao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RefeicaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Refeicao model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Refeicao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Refeicao();
        $model->restaurante_id = 1;
        $searchModelIngredientes = new IngredienteSearch();
        $dataProviderIngredientes = $searchModelIngredientes->search($this->request->queryParams);


        if ($this->request->isPost) {
            $selection = (array)Yii::$app->request->post('selection');

            if ($model->load($this->request->post())) {
                if($model->save('true', ['data', 'restaurante_id', 'id'])) {
                    foreach($selection as $ingrediente_id) {
                        $modelIngRef = new IngredienteRefeicao();
                        $modelIngRef->ingrediente_id = $ingrediente_id;
                        $modelIngRef->refeicao_id = $model->id;
                        $modelIngRef->save();
                    }
                }
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'dataProviderIngredientes' => $dataProviderIngredientes,
            'searchModelIngredientes' => $searchModelIngredientes
        ]);
    }

    /**
     * Updates an existing Refeicao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Refeicao model.
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
     * Finds the Refeicao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Refeicao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Refeicao::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
