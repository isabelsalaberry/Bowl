<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refeicao".
 *
 * @property int $id
 * @property string $data
 * @property int $restaurante_id
 *
 * @property IngredienteRefeicao[] $ingredienteRefeicaos
 * @property Restaurante $restaurante
 */
class Refeicao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refeicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'restaurante_id'], 'required'],
            [['data'], 'safe'],
            [['restaurante_id'], 'integer'],
            [['restaurante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurante::class, 'targetAttribute' => ['restaurante_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'restaurante_id' => 'Restaurante ID',
        ];
    }

    /**
     * Gets query for [[IngredienteRefeicaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteRefeicaos()
    {
        return $this->hasMany(IngredienteRefeicao::class, ['refeicao_id' => 'id']);
    }

    /**
     * Gets query for [[Restaurante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurante()
    {
        return $this->hasOne(Restaurante::class, ['id' => 'restaurante_id']);
    }
}
