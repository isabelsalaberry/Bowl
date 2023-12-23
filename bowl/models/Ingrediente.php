<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingrediente".
 *
 * @property int $id
 * @property int $categoria_id
 * @property string $nome
 * @property string $descricao
 * @property float $preco_g
 * @property float $calorias_g
 * @property float $carboidrato_g
 * @property float $acucar_g
 * @property float $proteina_g
 * @property float $sodio_g
 * @property float $gordura_g
 * @property float $gordura_saturada_g
 * @property float $fibras_g
 * @property int $gluten
 * @property int $lactose
 * @property int $vegan
 *
 * @property Categoriaingrediente $categoria
 * @property IngredienteRefeicao[] $ingredienteRefeicaos
 */
class Ingrediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingrediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria_id', 'nome', 'descricao', 'preco_g', 'calorias_g', 'carboidrato_g', 'acucar_g', 'proteina_g', 'sodio_g', 'gordura_g', 'gordura_saturada_g', 'fibras_g', 'gluten', 'lactose', 'vegan'], 'required'],
            [['categoria_id', 'gluten', 'lactose', 'vegan'], 'integer'],
            [['preco_g', 'calorias_g', 'carboidrato_g', 'acucar_g', 'proteina_g', 'sodio_g', 'gordura_g', 'gordura_saturada_g', 'fibras_g'], 'number'],
            [['nome'], 'string', 'max' => 45],
            [['descricao'], 'string', 'max' => 200],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaingrediente::class, 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'preco_g' => 'Preco G',
            'calorias_g' => 'Calorias G',
            'carboidrato_g' => 'Carboidrato G',
            'acucar_g' => 'Acucar G',
            'proteina_g' => 'Proteina G',
            'sodio_g' => 'Sodio G',
            'gordura_g' => 'Gordura G',
            'gordura_saturada_g' => 'Gordura Saturada G',
            'fibras_g' => 'Fibras G',
            'gluten' => 'Gluten',
            'lactose' => 'Lactose',
            'vegan' => 'Vegan',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoriaingrediente::class, ['id' => 'categoria_id']);
    }

    /**
     * Gets query for [[IngredienteRefeicaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredienteRefeicaos()
    {
        return $this->hasMany(IngredienteRefeicao::class, ['ingrediente_id' => 'id']);
    }
}
