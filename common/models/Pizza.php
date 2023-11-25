<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pizza".
 *
 * @property int $pizzaId
 * @property string $pizzaName
 * @property string $description
 * @property string|null $pizzaImage
 * @property int $categoryId
 *
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
            [['pizzaName', 'description', 'categoryId'], 'required'],
            [['categoryId'], 'integer'],
            [['pizzaName'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['pizzaImage'], 'string', 'max' => 100],
            [['pizzaImageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
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
            'description' => 'Description',
            'pizzaImage' => 'Pizza Image',
            'categoryId' => 'Category ID',
        ];
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
