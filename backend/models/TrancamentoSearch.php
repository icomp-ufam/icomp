<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trancamento;

/**
 * TrancamentoSearch represents the model behind the search form of `app\models\Trancamento`.
 */
class TrancamentoSearch extends Trancamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qtdDias', 'status'], 'integer'],
            [['idAluno', 'orientador', 'dataSolicitacao', 'dataInicio', 'dataTermino', 'justificativa', 'documento'], 'safe'],
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
        $query = Trancamento::find();

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

        $query->joinWith('aluno');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dataSolicitacao' => $this->dataSolicitacao,
            'dataInicio' => $this->dataInicio,
            'qtdDias' => $this->qtdDias,
            'dataTermino' => $this->dataTermino,
            'j17_trancamentos.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'j17_aluno.nome', $this->idAluno])
            ->andFilterWhere(['like', 'justificativa', $this->justificativa])
            ->andFilterWhere(['like', 'documento', $this->documento]);

        return $dataProvider;
    }
}
