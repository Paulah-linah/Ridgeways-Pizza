<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CartItem;

/**
 * CartItemSearch represents the model behind the search form of `frontend\models\CartItem`.
 */
class CartItemSearch extends CartItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartItemId', 'pizzaId', 'sizeId', 'userId', 'quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CartItem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cartItemId' => $this->cartItemId,
            'pizzaId' => $this->pizzaId,
            'sizeId' => $this->sizeId,
            'userId' => $this->userId,
            'quantity' => $this->quantity,
        ]);

        return $dataProvider;
    }
}
