<?php

namespace frontend\models;

use common\models\Pizza;
use common\models\Size;
use common\models\User;
use Yii;

/**
 * This is the model class for table "cartItem".
 *
 * @property int $cartItemId
 * @property int $pizzaId
 * @property int $sizeId
 * @property int $userId
 * @property int $quantity
 *
 * @property Pizza $pizza
 * @property Size $size
 * @property User $user
 */
class CartItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cartItem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizzaId', 'sizeId', 'userId', 'quantity'], 'required'],
            [['pizzaId', 'sizeId', 'userId', 'quantity'], 'integer'],
            [['pizzaId'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::class, 'targetAttribute' => ['pizzaId' => 'pizzaId']],
            [['sizeId'], 'exist', 'skipOnError' => true, 'targetClass' => Size::class, 'targetAttribute' => ['sizeId' => 'sizeId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartItemId' => 'Cart Item ID',
            'pizzaId' => 'Pizza ID',
            'sizeId' => 'Size ID',
            'userId' => 'User ID',
            'quantity' => 'Quantity',
        ];
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

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::class, ['sizeId' => 'sizeId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }
}
