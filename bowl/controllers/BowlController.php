<?php

namespace app\controllers;

use app\models\Bowl;
use app\models\BowlSearch;
use app\models\Carrinho;
use app\models\Ingrediente;
use app\models\IngredienteBowl;
use app\models\IngredienteRefeicao;
use app\models\IngredienteSearch;
use app\models\Refeicao;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BowlController implements the CRUD actions for Bowl model.
 */
class BowlController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Bowl models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BowlSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bowl model.
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
     * Creates a new Bowl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $cliente_id = 1;
        $carrinho = Carrinho::find()->where(['cliente_id' => $cliente_id])->one();

        $modelBowl = new Bowl();

        $refeicao_dia = Refeicao::temRefeicaoHoje();
        $ingredientes_bowl = [];

        if($refeicao_dia!=null) {
            $ingredientes_refeicao = IngredienteRefeicao::find()->where(['refeicao_id' => $refeicao_dia->id])->all();
            foreach($ingredientes_refeicao as $ingrediente_refeicao) {
                $ingrediente_bowl = new IngredienteBowl();
                $ingrediente_bowl->ing_ref_id = $ingrediente_refeicao->id;
                array_push($ingredientes_bowl, $ingrediente_bowl);
            }
        }

        if ($this->request->isPost) {
            $ingredientes_bowl = Yii::$app->request->post('IngredienteBowl', []);
            $selection = (array)Yii::$app->request->post('selection');

            $modelsIngredienteBowl = [];
            foreach ($ingredientes_bowl as $ing_ref_id => $data) {
                foreach($selection as $s => $key) {
                    if($key == $ing_ref_id) {
                        $model = new IngredienteBowl();
                        $model->ing_ref_id = $ing_ref_id;
                        $model->quantidade = $data['quantidade'];
                        $modelsIngredienteBowl[] = $model;
                    }
                }
            }

            $valid = IngredienteBowl::validateMultiple($modelsIngredienteBowl, ['ing_ref_id', 'quantidade']);
            if ($valid) {
                $preco = 0;
                $calorias = 0;
                $carboidratos = 0;
                $acucares = 0;
                $proteinas = 0;
                $sodios = 0;
                $gorduras = 0;
                $gorduras_sat = 0;
                $fibras = 0;
                $gluten = 0;
                $lactose = 0;
                $vegan = 0;
                foreach($modelsIngredienteBowl as $ingBowl) {
                    $preco += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->preco_g;
                    $calorias += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->calorias_g;
                    $carboidratos += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->carboidrato_g;
                    $acucares += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->acucar_g;
                    $proteinas += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->proteina_g;
                    $sodios += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->sodio_g;
                    $gorduras += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->gordura_g;
                    $gorduras_sat += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->gordura_saturada_g;
                    $fibras += $ingBowl->quantidade * $ingBowl->ingRef->ingrediente->fibras_g;
                    if($ingBowl->ingRef->ingrediente->gluten == 0) $gluten = $ingBowl->ingRef->ingrediente->gluten;
                    if($ingBowl->ingRef->ingrediente->lactose == 0) $lactose = $ingBowl->ingRef->ingrediente->lactose;
                    if($ingBowl->ingRef->ingrediente->vegan == 0) $vegan = $ingBowl->ingRef->ingrediente->vegan;
                }

                $carrinho->preco = $preco;
                $carrinho->calorias = $calorias;
                $carrinho->carboidratos = $carboidratos;
                $carrinho->acucares = $acucares;
                $carrinho->proteinas = $proteinas;
                $carrinho->sodios = $sodios;
                $carrinho->gorduras = $gorduras;
                $carrinho->gorduras_saturadas = $gorduras_sat;
                $carrinho->fibras = $fibras;
                if($carrinho->gluten == 0) $carrinho->gluten = $gluten;
                if($carrinho->lactose == 0) $carrinho->lactose = $lactose;
                if($carrinho->vegan == 0) $carrinho->vegan = $vegan;
                $carrinho->save();

                $modelBowl->carrinho_id = $carrinho->id;
                $modelBowl->preco = $preco;
                if($modelBowl->validate(['carrinho_id', 'preco']) && $modelBowl->save()) {
                    foreach ($modelsIngredienteBowl as $modelIngBowl) {
                        $modelIngBowl->bowl_id = $modelBowl->id;
                        $modelIngBowl->save(false);
                    }
                }
                Yii::$app->session->setFlash('success', 'Bowl. adicionado ao carrinho.');
            } else {
                Yii::$app->session->setFlash('error', 'Erro ao adicionar ao carrinho.');
            }

            return $this->redirect(['/carrinho/view', 'id' => $carrinho->id]);
        } else {
            foreach($ingredientes_bowl as $ing) {
                $ing->loadDefaultValues();
            }
        }

        return $this->render('create', [
            'ingredientes_bowl' => $ingredientes_bowl,
        ]);
    }

    /**
     * Updates an existing Bowl model.
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
     * Deletes an existing Bowl model.
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
     * Finds the Bowl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Bowl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bowl::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}