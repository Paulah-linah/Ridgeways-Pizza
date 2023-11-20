<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $sizeId
 * @property string $sizeName
 * @property float $price
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sizeName', 'price'], 'required'],
            [['price'], 'number'],
            [['sizeName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sizeId' => 'Size ID',
            'sizeName' => 'Size Name',
            'price' => 'Price',
        ];
    }
}
