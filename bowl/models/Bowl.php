<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bowl".
 *
 * @property int $id
 * @property int $carrinho_id
 * @property float $preco
 *
 * @property Carrinho $carrinho
 * @property IngredienteBowl[] $ingredienteBowls
 */
class Bowl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bowl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carrinho_id', 'preco'], 'required'],
            [['carrinho_id'], 'integer'],
            [['preco'], 'number'],
            [['carrinho_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrinho::class, 'targetAttribute' => ['carrinho_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carrinho_id' => 'Carrinho ID',
            'preco' => 'Preço',
        ];
    }

    /**
     * Gets query for [[Carrinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinho()
    {
        return $this->hasOne(Carrinho::class, ['id' => 'carrinho_id']);
    }

    /**
     * Gets query for [[IngredienteBowls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteBowls()
    {
        return $this->hasMany(IngredienteBowl::class, ['bowl_id' => 'id']);
    }
}
