<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nome
 * @property string $nif
 * @property string $telemovel
 * @property string $morada
 * @property string $email
 * @property string $password
 *
 * @property User $user
 * @property Carrinho[] $carrinhos
 * @property Mensagem[] $mensagems
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'nif', 'telemovel', 'morada', 'email', 'password'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['nif'], 'string', 'max' => 10],
            [['telemovel'], 'string', 'max' => 20],
            [['morada'], 'string', 'max' => 150],
            [['email', 'password'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \amnah\yii2\user\models\User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'nif' => 'Nif',
            'telemovel' => 'Telemovel',
            'morada' => 'Morada',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['cliente_id' => 'id']);
    }

    /**
     * Gets query for [[Mensagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensagems()
    {
        return $this->hasMany(Mensagem::class, ['cliente_id' => 'id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['cliente_id' => 'id']);
    }
}
