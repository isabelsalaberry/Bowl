<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property int $id
 * @property int $restaurante_id
 * @property string $nome_cliente
 * @property string $email
 * @property string $msg
 *
 * @property Restaurante $restaurante
 */
class Mensagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['restaurante_id', 'email', 'msg'], 'required'],
            [['restaurante_id'], 'integer'],
            [['msg'], 'string'],
            [['nome_cliente', 'email'], 'string', 'max' => 100],
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
            'restaurante_id' => 'Restaurante ID',
            'nome_cliente' => 'Nome Cliente',
            'email' => 'Email',
            'msg' => 'Msg',
        ];
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
