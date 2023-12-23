<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingrediente;

/**
 * IngredienteSearch represents the model behind the search form of `app\models\Ingrediente`.
 */
class IngredienteSearch extends Ingrediente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoria_id', 'gluten', 'lactose', 'vegan'], 'integer'],
            [['nome', 'descricao'], 'safe'],
            [['preco_g', 'calorias_g', 'carboidrato_g', 'acucar_g', 'proteina_g', 'sodio_g', 'gordura_g', 'gordura_saturada_g', 'fibras_g'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ingrediente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'categoria_id' => $this->categoria_id,
            'preco_g' => $this->preco_g,
            'calorias_g' => $this->calorias_g,
            'carboidrato_g' => $this->carboidrato_g,
            'acucar_g' => $this->acucar_g,
            'proteina_g' => $this->proteina_g,
            'sodio_g' => $this->sodio_g,
            'gordura_g' => $this->gordura_g,
            'gordura_saturada_g' => $this->gordura_saturada_g,
            'fibras_g' => $this->fibras_g,
            'gluten' => $this->gluten,
            'lactose' => $this->lactose,
            'vegan' => $this->vegan,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
