<?php

namespace app\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    public function rules()
    {
        return [
            [['id', 'category_id', 'distributor_id', 'status', 'serial', 'prioritize', 'sale'], 'integer'],
            [['created_at', 'imager'], 'safe'],
            [['price'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'distributor_id' => $this->distributor_id,
            'created_at' => $this->created_at,
            'price' => $this->price,
            'status' => $this->status,
            'serial' => $this->serial,
            'prioritize' => $this->prioritize,
            'sale' => $this->sale,
        ]);

        $query->andFilterWhere(['like', 'imager', $this->imager]);

        return $dataProvider;
    }
}
