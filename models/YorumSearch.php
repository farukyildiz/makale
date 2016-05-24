<?php

namespace backend\modules\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\blog\models\Yorum;

/**
 * YorumSearch represents the model behind the search form about `backend\modules\blog\models\Yorum`.
 */
class YorumSearch extends Yorum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'makaleid'], 'integer'],
            [['yorum'], 'safe'],
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
        $query = Yorum::find();

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
            'makaleid' => $this->makaleid,
        ]);

        $query->andFilterWhere(['like', 'yorum', $this->yorum]);

        return $dataProvider;
    }
}
