<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $cartId
 * @property int $pizzaId
 * @property int $quantity
 *
 * @property Order[] $orders
 * @property Pizza $pizza
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizzaId', 'quantity'], 'required'],
            [['pizzaId', 'quantity'], 'integer'],
            [['pizzaId'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::class, 'targetAttribute' => ['pizzaId' => 'pizzaId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartId' => 'Cart ID',
            'pizzaId' => 'Pizza ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['cartId' => 'cartId']);
    }

    /**
     * Gets query for [[Pizza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizza()
    {
        return $this->hasOne(Pizza::class, ['pizzaId' => 'pizzaId']);
    }
}
