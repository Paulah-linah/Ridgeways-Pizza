<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pizza;

/**
 * PizzaSearch represents the model behind the search form of `common\models\Pizza`.
 */
class PizzaSearch extends Pizza
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizzaId', 'categoryId'], 'integer'],
            [['pizzaName', 'pizzaImage'], 'safe'],
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
        $query = Pizza::find();

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
            'pizzaId' => $this->pizzaId,
            'categoryId' => $this->categoryId,
        ]);

        $query->andFilterWhere(['like', 'pizzaName', $this->pizzaName])
            ->andFilterWhere(['like', 'pizzaImage', $this->pizzaImage]);

        return $dataProvider;
    }
}
