<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $categoryId
 * @property string $categoryName
 *
 * @property Pizza[] $pizzas
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryName'], 'required'],
            [['categoryName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'categoryName' => 'Category Name',
        ];
    }

    /**
     * Gets query for [[Pizzas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizzas()
    {
        return $this->hasMany(Pizza::class, ['categoryId' => 'categoryId']);
    }
}
