<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cautela;

/**
 * CautelaSearch represents the model behind the search form of `app\models\Cautela`.
 */
class CautelaSearch extends Cautela
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdCautela', 'NomeResponsavel', 'OrigemCautela', 'DataDevolucao', 'ImagemCautela', 'Email', 'ValidadeCautela'], 'safe'],
            [['TelefoneResponsavel'], 'integer'],
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
        $query = Cautela::find();

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
            'DataDevolucao' => $this->DataDevolucao,
            'TelefoneResponsavel' => $this->TelefoneResponsavel,
        ]);

        $query->andFilterWhere(['like', 'IdCautela', $this->IdCautela])
            ->andFilterWhere(['like', 'NomeResponsavel', $this->NomeResponsavel])
            ->andFilterWhere(['like', 'OrigemCautela', $this->OrigemCautela])
            ->andFilterWhere(['like', 'ImagemCautela', $this->ImagemCautela])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'ValidadeCautela', $this->ValidadeCautela]);

        return $dataProvider;
    }
}
