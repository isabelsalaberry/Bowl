<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "ingrediente".
 *
 * @property int $id
 * @property int $categoria_id
 * @property string $nome
 * @property string $descricao
 * @property string $image_path
 * @property double $preco_g
 * @property double $calorias_g
 * @property double $carboidrato_g
 * @property double $acucar_g
 * @property double $proteina_g
 * @property double $sodio_g
 * @property double $gordura_g
 * @property double $gordura_saturada_g
 * @property double $fibras_g
 * @property int $gluten
 * @property int $lactose
 * @property int $vegan
 *
 * @property Categoriaingrediente $categoria
 * @property IngredienteRefeicao[] $ingredienteRefeicaos
 */
class Ingrediente extends \yii\db\ActiveRecord
{
    public $imageFile;

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
            [['image_path'], 'string'],
            [['descricao'], 'string', 'max' => 200],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaingrediente::class, 'targetAttribute' => ['categoria_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg',  'maxSize' => 1024 * 1024 * 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria',
            'nome' => 'Nome',
            'descricao' => 'Descrição do Produto',
            'preco_g' => 'Preco (g)',
            'calorias_g' => 'Calorias (g)',
            'carboidrato_g' => 'Carboidratos (g)',
            'acucar_g' => 'Açúcares (g)',
            'proteina_g' => 'Proteínas (g)',
            'sodio_g' => 'Sódio (g)',
            'gordura_g' => 'Gorduras (g)',
            'gordura_saturada_g' => 'Gorduras Saturadas (g)',
            'fibras_g' => 'Fibras (g)',
            'gluten' => 'Glúten',
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

    public function uploadPath()
    {
        return Yii::getAlias('@webroot') . '/uploads/ingredientes/';
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = $this->uploadPath() . $this->imageFile->fullPath;
            $this->imageFile->saveAs($path);
            return true;
        } else return false;
    }
}
