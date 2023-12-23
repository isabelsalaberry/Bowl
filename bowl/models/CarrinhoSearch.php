<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carrinho;

/**
 * CarrinhoSearch represents the model behind the search form of `app\models\Carrinho`.
 */
class CarrinhoSearch extends Carrinho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id', 'gluten', 'lactose', 'vegan'], 'integer'],
            [['preco', 'calorias', 'carboidratos', 'acucares', 'proteinas', 'sodios', 'gorduras', 'gorduras_saturadas', 'fibras'], 'number'],
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
        $query = Carrinho::find();

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
            'cliente_id' => $this->cliente_id,
            'preco' => $this->preco,
            'calorias' => $this->calorias,
            'carboidratos' => $this->carboidratos,
            'acucares' => $this->acucares,
            'proteinas' => $this->proteinas,
            'sodios' => $this->sodios,
            'gorduras' => $this->gorduras,
            'gorduras_saturadas' => $this->gorduras_saturadas,
            'fibras' => $this->fibras,
            'gluten' => $this->gluten,
            'lactose' => $this->lactose,
            'vegan' => $this->vegan,
        ]);

        return $dataProvider;
    }
}
