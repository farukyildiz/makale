<?php

namespace backend\modules\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\blog\models\Makale;

/**
 * MakaleSearch represents the model behind the search form about `backend\modules\blog\models\Makale`.
 */
class MakaleSearch extends Makale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Ad', 'Konu', 'Metin', 'Etiket'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Makale::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'Ad', $this->Ad])
            ->andFilterWhere(['like', 'Konu', $this->Konu])
            ->andFilterWhere(['like', 'Metin', $this->Metin])
            ->andFilterWhere(['like', 'Etiket', $this->Etiket]);

        return $dataProvider;
    }
}
