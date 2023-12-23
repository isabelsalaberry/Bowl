<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente_bowl".
 *
 * @property int $id
 * @property int $ing_ref_id
 * @property int $bowl_id
 *
 * @property Bowl $bowl
 * @property IngredienteRefeicao $ingRef
 */
class IngredienteBowl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingrediente_bowl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ing_ref_id', 'bowl_id'], 'required'],
            [['ing_ref_id', 'bowl_id'], 'integer'],
            [['bowl_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bowl::class, 'targetAttribute' => ['bowl_id' => 'id']],
            [['ing_ref_id'], 'exist', 'skipOnError' => true, 'targetClass' => IngredienteRefeicao::class, 'targetAttribute' => ['ing_ref_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ing_ref_id' => 'Ing Ref ID',
            'bowl_id' => 'Bowl ID',
        ];
    }

    /**
     * Gets query for [[Bowl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBowl()
    {
        return $this->hasOne(Bowl::class, ['id' => 'bowl_id']);
    }

    /**
     * Gets query for [[IngRef]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngRef()
    {
        return $this->hasOne(IngredienteRefeicao::class, ['id' => 'ing_ref_id']);
    }
}
