<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Size;

/**
 * SizeSearch represents the model behind the search form of `common\models\Size`.
 */
class SizeSearch extends Size
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sizeId'], 'integer'],
            [['sizeName'], 'safe'],
            [['price'], 'number'],
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
        $query = Size::find();

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
            'sizeId' => $this->sizeId,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'sizeName', $this->sizeName]);

        return $dataProvider;
    }
}
