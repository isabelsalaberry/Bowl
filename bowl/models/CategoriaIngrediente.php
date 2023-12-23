<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoriaingrediente".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Ingrediente[] $ingredientes
 */
class CategoriaIngrediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoriaingrediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Ingredientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientes()
    {
        return $this->hasMany(Ingrediente::class, ['categoria_id' => 'id']);
    }
}
