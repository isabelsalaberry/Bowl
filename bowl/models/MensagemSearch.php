<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mensagem;

/**
 * MensagemSearch represents the model behind the search form of `app\models\Mensagem`.
 */
class MensagemSearch extends Mensagem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'restaurante_id'], 'integer'],
            [['nome_cliente', 'email', 'msg'], 'safe'],
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
        $query = Mensagem::find();

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
            'restaurante_id' => $this->restaurante_id,
        ]);

        $query->andFilterWhere(['like', 'nome_cliente', $this->nome_cliente])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'msg', $this->msg]);

        return $dataProvider;
    }
}
