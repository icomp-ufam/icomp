<?php

namespace app\models;

use Yii;


class Trancamento extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_trancamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
			[['idAluno', 'idOrientador', 'dataSolicitacao', 'dataInicio', 'prevTermino', 'justificativa'], 'required'],
            [['dataTermino', 'documento'], 'safe'],
			[['documento'], 'file', 'extensions' => 'pdf'] ,
			[['justificativa'], 'string'],
			[['prevTermino'], 'validarDataRetorno']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAluno' => 'Aluno',
			'idOrientador' => 'Orientador',
            'dataInicio' => 'Data de Início',
            'dataTermino' => 'Data de Retorno',
            'dataTermino' => 'Previsão de Retorno',
            'justificativa' => 'Justificativa',
            'documento' => 'Documento'
        ];
    }
	
    public function validarDataRetorno($attribute, $params){
        if (!$this->hasErrors()) {
            if (date("Y-m-d", strtotime($this->prevTermino)) < date("Y-m-d", strtotime($this->dataInicio))) {
                $this->addError($attribute, 'Informe uma data igual ou posterior a '.date("d-m-Y", strtotime($this->prevTermino)));
            }
        }
    }
	
	public function beforeSave(){
        $this->dataInicio = date('Y-m-d', strtotime($this->dataInicio));
        $this->dataTermino =  date('Y-m-d', strtotime($this->dataTermino));
		$this->prevTermino =  date('Y-m-d', strtotime($this->prevTermino));

        return true;
    }	
	
	public function upload($idAluno)
    {
        if ($this->validate()) {
			$nomeArquivo = 'uploads/trancamento-' . $idAluno . '-' . date("y-m-d").'.'.$this->documento->extension;
            $this->lattesFile->saveAs($nomeArquivo);
        } else {
            return false;
        }
		return true;
    }

}
