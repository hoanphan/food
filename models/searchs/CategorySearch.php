<?php

namespace app\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form about `app\models\Category`.
 */
class CategorySearch extends Category
{
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
