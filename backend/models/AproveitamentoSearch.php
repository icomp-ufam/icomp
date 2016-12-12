<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aproveitamento;

/**
 * AproveitamentoSearch represents the model behind the search form of `app\models\Aproveitamento`.
 */
class AproveitamentoSearch extends Aproveitamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idAluno'], 'integer'],
            [['codDisciplinaOrigemFK', 'codDisciplinaDestinoFK', 'situacao'], 'safe'],
            [['nota', 'frequencia'], 'number'],
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
        $query = Aproveitamento::find();

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
            'nota' => $this->nota,
            'frequencia' => $this->frequencia,
            'idAluno' => $this->idAluno,
        ]);

        $query->andFilterWhere(['like', 'codDisciplinaOrigemFK', $this->codDisciplinaOrigemFK])
            ->andFilterWhere(['like', 'codDisciplinaDestinoFK', $this->codDisciplinaDestinoFK])
            ->andFilterWhere(['like', 'situacao', $this->situacao]);

        return $dataProvider;
    }
    
}
