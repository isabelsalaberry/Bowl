<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $id
 * @property int $cliente_id
 * @property float $preco
 * @property float $calorias
 * @property float $carboidratos
 * @property float $acucares
 * @property float $proteinas
 * @property float $sodios
 * @property float $gorduras
 * @property float $gorduras_saturadas
 * @property float $fibras
 * @property int $gluten
 * @property int $lactose
 * @property int $vegan
 *
 * @property Bowl[] $bowls
 * @property Cliente $cliente
 * @property Pedido[] $pedidos
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'preco', 'calorias', 'carboidratos', 'acucares', 'proteinas', 'sodios', 'gorduras', 'gorduras_saturadas', 'fibras', 'gluten', 'lactose', 'vegan'], 'required'],
            [['cliente_id', 'gluten', 'lactose', 'vegan'], 'integer'],
            [['preco', 'calorias', 'carboidratos', 'acucares', 'proteinas', 'sodios', 'gorduras', 'gorduras_saturadas', 'fibras'], 'number'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente ID',
            'preco' => 'Preco',
            'calorias' => 'Calorias',
            'carboidratos' => 'Carboidratos',
            'acucares' => 'Acucares',
            'proteinas' => 'Proteinas',
            'sodios' => 'Sodios',
            'gorduras' => 'Gorduras',
            'gorduras_saturadas' => 'Gorduras Saturadas',
            'fibras' => 'Fibras',
            'gluten' => 'Gluten',
            'lactose' => 'Lactose',
            'vegan' => 'Vegan',
        ];
    }

    /**
     * Gets query for [[Bowls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBowls()
    {
        return $this->hasMany(Bowl::class, ['carrinho_id' => 'id']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'cliente_id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['carrinho_id' => 'id']);
    }
}
