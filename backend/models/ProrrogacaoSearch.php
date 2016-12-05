<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prorrogacao;

/**
 * ProrrogacaoSearch represents the model behind the search form of `app\models\Prorrogacao`.
 */
class ProrrogacaoSearch extends Prorrogacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idAluno', 'qtdDias', 'status'], 'integer'],
            [['dataSolicitacao', 'justificativa', 'previa'], 'safe'],
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
        $query = Prorrogacao::find();

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
            'id' => $this->id,
            'idAluno' => $this->idAluno,
            'dataSolicitacao' => $this->dataSolicitacao,
            'qtdDias' => $this->qtdDias,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'justificativa', $this->justificativa])
            ->andFilterWhere(['like', 'previa', $this->previa]);

        return $dataProvider;
    }
}
