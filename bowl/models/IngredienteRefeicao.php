<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente_refeicao".
 *
 * @property int $id
 * @property int $refeicao_id
 * @property int $ingrediente_id
 *
 * @property Ingrediente $ingrediente
 * @property IngredienteBowl[] $ingredienteBowls
 * @property Refeicao $refeicao
 */
class IngredienteRefeicao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingrediente_refeicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['refeicao_id', 'ingrediente_id'], 'required'],
            [['refeicao_id', 'ingrediente_id'], 'integer'],
            [['ingrediente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingrediente::class, 'targetAttribute' => ['ingrediente_id' => 'id']],
            [['refeicao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refeicao::class, 'targetAttribute' => ['refeicao_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'refeicao_id' => 'Refeicao ID',
            'ingrediente_id' => 'Ingrediente ID',
        ];
    }

    /**
     * Gets query for [[Ingrediente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngrediente()
    {
        return $this->hasOne(Ingrediente::class, ['id' => 'ingrediente_id']);
    }

    /**
     * Gets query for [[IngredienteBowls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteBowls()
    {
        return $this->hasMany(IngredienteBowl::class, ['ing_ref_id' => 'id']);
    }

    /**
     * Gets query for [[Refeicao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicao()
    {
        return $this->hasOne(Refeicao::class, ['id' => 'refeicao_id']);
    }
}
