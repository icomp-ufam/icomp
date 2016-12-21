<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portaria;

/**
 * PortariaSearch represents the model behind the search form of `app\models\Portaria`.
 */
class PortariaSearch extends Portaria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['id','ano'], 'integer'],
            [['responsavel', 'descricao', 'data', 'data0', 'documento'], 'safe'],
=======
            //[['id'], 'integer'],
            [['id', 'ano',/*'responsavel',*/ 'descricao', 'data', 'data0', 'documento'], 'safe'],
>>>>>>> a1bd604b15dd09b592db7ceefdd6423e74079a1e
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
        $query = Portaria::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => array(
                'attributes' => array(
                    'id',
                    'ano',
                    'responsavel',
                    'data0' => array(
                        'asc' => array('data' => SORT_ASC),
                        'desc'=> array('data' => SORT_DESC)
                    )
                )
            ),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $searchedData = explode("/", $this->data0);
        if (sizeof($searchedData) == 3) {
            $searchedData = $searchedData[2]."-".$searchedData[1]."-".$searchedData[0];
        }
        else $searchedData = '';

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ano' => $this->ano,
            'data' => $searchedData,
        ]);

        //$query->andFilterWhere(['like', 'responsavel', $this->responsavel]);
            //->andFilterWhere(['like', 'descricao', $this->descricao])
            //->andFilterWhere(['like', 'documento', $this->documento]);

        return $dataProvider;
    }
}
