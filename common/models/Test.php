<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pizza".
 *
 * @property int $pizzaId
 * @property string $pizzaName
 * @property string $pizzaImage
 * @property int $categoryId
 * @property float $price
 * @property string $size
 * @property string $crustType
 *
 * @property Cart[] $carts
 * @property Category $category
 */
class Pizza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizza';
    }

    public $pizzaImageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizzaName', 'categoryId', 'price', 'size', 'crustType'], 'required'],
            [['categoryId'], 'integer'],
            [['price'], 'number'],
            [['size', 'crustType'], 'string'],
            [['pizzaName'], 'string', 'max' => 50],
            [['pizzaImage'], 'string', 'max' => 100],
            [['pizzaImageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryId' => 'categoryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pizzaId' => 'Pizza ID',
            'pizzaName' => 'Pizza Name',
            'pizzaImage' => 'Pizza Image',
            'categoryId' => 'Category ID',
            'price' => 'Price',
            'size' => 'Size',
            'crustType' => 'Crust Type',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['pizzaId' => 'pizzaId']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['categoryId' => 'categoryId']);
    }
}
