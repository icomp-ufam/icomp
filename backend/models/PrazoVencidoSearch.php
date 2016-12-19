<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;
use app\models\Trancamento;
use yii\db\Query;
use yii\db\ActiveQuery;
use yii\db\Connection;
use yii\base\Component;

/**
 * PrazoVencidoSearch represents the model behind the search form about `app\models\Aluno`.
 */
class PrazoVencidoSearch extends Aluno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'area', 'curso',  'regime', 'status', 'egressograd', 'idUser', 'orientador'], 'integer'],
            [['nome', 'email', 'senha', 'matricula', 'endereco', 'bairro', 'cidade', 'uf', 'cep', 'siglaLinhaPesquisa', 'nomeOrientador', 'datanascimento', 'sexo', 'cpf', 'telresidencial', 'telcelular', 'bolsista', 'dataingresso', 'idiomaExameProf', 'conceitoExameProf', 'dataExameProf', 'cursograd', 'instituicaograd', 'anoconclusao', 'sede'], 'safe'],
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
        $idUsuario = Yii::$app->user->identity->id;

        $sql1= "CALL prazoVencido()";
        $connection = Yii::$app->db;
		$command = $connection->createCommand($sql1);     
		$command->execute();

        $sql2= "select aluno.*,j17_linhaspesquisa.sigla as siglaLinhaPesquisa, 
        j17_linhaspesquisa.icone as icone, j17_linhaspesquisa.cor as corLinhaPesquisa, j17_user.nome as nomeOrientador from j17_aluno as aluno,j17_linhaspesquisa,j17_user,pv where aluno.area = j17_linhaspesquisa.id and aluno.orientador = j17_user.id and aluno.id = pv.id and (pv.curso=1 and dNormal > 730.50 and qProrrogacao is NULL and qTrancamento is NULL) or (pv.curso=1 and dNormal > 730.50 and qProrrogacao is NULL and not(qTrancamento is NULL) and dTrancamento > 365.25) or (pv.curso=1 and dNormal > 730.50 and not(qProrrogacao is NULL) and qTrancamento is NULL and dProrrogacao > 365.25) or (pv.curso=1 and dNormal > 730.50 and not(qProrrogacao is NULL) and not(qTrancamento is NULL) and dProrrogacao > 365.25 and dTrancamento > 365.25) or (pv.curso=2 and dNormal > 1461 and qProrrogacao is NULL and qTrancamento is NULL) or (pv.curso=2 and dNormal > 1461 and qProrrogacao is NULL and not(qTrancamento is NULL) and dTrancamento > 730.50) or (pv.curso=2 and dNormal > 1461 and not(qProrrogacao is NULL) and qTrancamento is NULL and dProrrogacao > 730.50) or (pv.curso=2 and dNormal > 1461 and not(qProrrogacao is NULL) and not(qTrancamento is NULL) and dProrrogacao > 730.50 and dTrancamento > 730.50)";

        $query = Aluno::findBySql($sql2);

		if(!isset ($params['sort'])){
            $query = $query->orderBy('nome');
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //var_dump($dataProvider);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $dataProvider->sort->attributes['sigla'] = [
            'asc' => ['sigla' => SORT_ASC],
            'desc' => ['sigla' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['siglaLinhaPesquisa'] = [
            'asc' => ['siglaLinhaPesquisa' => SORT_ASC],
            'desc' => ['siglaLinhaPesquisa' => SORT_DESC],
        ];
		$dataProvider->sort->attributes['nomeOrientador'] = [
            'asc' => ['nomeOrientador' => SORT_ASC],
            'desc' => ['nomeOrientador' => SORT_DESC],
        ];


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'curso' => $this->curso,
            'regime' => $this->regime,
            'j17_aluno.status' => $this->status,
            'area' => $this->siglaLinhaPesquisa,
            'egressograd' => $this->egressograd,
            'idUser' => $this->idUser,
            'orientador' => $this->orientador,
            'anoconclusao' => $this->anoconclusao,
        ]);

        $query->andFilterWhere(['like', 'j17_aluno.nome', $this->nome])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'j17_user.nome', $this->nomeOrientador])
            ->andFilterWhere(['like', 'j17_aluno.dataingresso', $this->dataingresso])
            ->andFilterWhere(['like', 'cursograd', $this->cursograd]);

        return $dataProvider;
    }
	
	public function searchOrientandos($params)
    {
        $idUsuario = Yii::$app->user->identity->id;
       
        $query = Aluno::find()->select("j17_linhaspesquisa.sigla as siglaLinhaPesquisa, j17_linhaspesquisa.cor as corLinhaPesquisa, j17_aluno.*")->leftJoin("j17_linhaspesquisa","j17_aluno.area = j17_linhaspesquisa.id")
           ->where('orientador = '.$idUsuario);

        if(!isset ($params['sort'])){
            $query = $query->orderBy('nome');
        }

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
            'curso' => $this->curso,
            'regime' => $this->regime,
            'j17_aluno.status' => $this->status,
            'area' => $this->siglaLinhaPesquisa,
            'egressograd' => $this->egressograd,
            'orientador' => $this->orientador,
            'anoconclusao' => $this->anoconclusao,
        ]);

        $query->andFilterWhere(['like', 'j17_aluno.nome', $this->nome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'uf', $this->uf])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'datanascimento', $this->datanascimento])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'j17_user.nome', $this->nomeOrientador])
            ->andFilterWhere(['like', 'telresidencial', $this->telresidencial])
            ->andFilterWhere(['like', 'telcelular', $this->telcelular])
            ->andFilterWhere(['like', 'bolsista', $this->bolsista])
            ->andFilterWhere(['like', 'j17_aluno.dataingresso', $this->dataingresso])
            ->andFilterWhere(['like', 'idiomaExameProf', $this->idiomaExameProf])
            ->andFilterWhere(['like', 'conceitoExameProf', $this->conceitoExameProf])
            ->andFilterWhere(['like', 'dataExameProf', $this->dataExameProf])
            ->andFilterWhere(['like', 'cursograd', $this->cursograd])
            ->andFilterWhere(['like', 'instituicaograd', $this->instituicaograd])
            ->andFilterWhere(['like', 'sede', $this->sede]);

        return $dataProvider;
    }	
    
    public function getAlunos($idUsuario)
    {
       
        $query = Aluno::find()->select("j17_aluno.*")->where('orientador = '.$idUsuario);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['sigla'] = [
            'asc' => ['sigla' => SORT_ASC],
            'desc' => ['sigla' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['siglaLinhaPesquisa'] = [
            'asc' => ['siglaLinhaPesquisa' => SORT_ASC],
            'desc' => ['siglaLinhaPesquisa' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'area' => $this->area,
            'curso' => $this->curso,
            'regime' => $this->regime,
            'status' => $this->status,
            'egressograd' => $this->egressograd,
            'idUser' => $this->idUser,
            'orientador' => $this->orientador,
            'anoconclusao' => $this->anoconclusao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'uf', $this->uf])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'datanascimento', $this->datanascimento])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'telresidencial', $this->telresidencial])
            ->andFilterWhere(['like', 'telcelular', $this->telcelular])
            ->andFilterWhere(['like', 'bolsista', $this->bolsista])
            ->andFilterWhere(['like', 'dataingresso', $this->dataingresso])
            ->andFilterWhere(['like', 'idiomaExameProf', $this->idiomaExameProf])
            ->andFilterWhere(['like', 'conceitoExameProf', $this->conceitoExameProf])
            ->andFilterWhere(['like', 'dataExameProf', $this->dataExameProf])
            ->andFilterWhere(['like', 'cursograd', $this->cursograd])
            ->andFilterWhere(['like', 'instituicaograd', $this->instituicaograd])
            ->andFilterWhere(['like', 'sede', $this->sede]);

        return $dataProvider;
    }
}
