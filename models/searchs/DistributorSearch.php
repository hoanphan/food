<?php

namespace app\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Distributor;

/**
 * DistributorSearch represents the model behind the search form about `app\models\Distributor`.
 */
class DistributorSearch extends Distributor
{
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [[ 'address', 'email', 'phone'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Distributor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
