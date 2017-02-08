<?php

namespace backend\models;

use Yii;
use backend\models\Equipamento;
use backend\models\ContProjProjetos;
/**
 * This is the model class for table "j17_cautela".
 *
 * @property integer $idCautela
 * @property string $NomeResponsavel
 * @property string $OrigemCautela
 * @property string $DataDevolucao
 * @property string $Email
 * @property string $ValidadeCautela
 * @property string $TelefoneResponsavel
 * @property string $ImagemCautela
 * @property string $Equipamento
 * @property string $StatusCautela
 * @property integer $idEquipamento
 * @property integer $idProjeto
 */
class Cautela extends \yii\db\ActiveRecord
{
	public $idsmulticautela;
	public $nomeEquipamento;
	public $nomeProjeto;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_cautela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NomeResponsavel', 'OrigemCautela', 'Email', 'TelefoneResponsavel', 'StatusCautela', 'idEquipamento', 'idProjeto', 'DataDevolucao', 'ValidadeCautela'], 'required'],
            [['idEquipamento', 'idProjeto'], 'integer'],
            [['NomeResponsavel', 'OrigemCautela', 'DataDevolucao', 'Email', 'ValidadeCautela', 'TelefoneResponsavel', 'Equipamento','nomeEquipamento', 'StatusCautela'], 'string', 'max' => 50],
            [['ImagemCautela'], 'string', 'max' => 100],
        	[['nomeProjeto'], 'string', 'max'=>200],
            [['idEquipamento'], 'exist', 'skipOnError' => true, 'targetClass' => Equipamento::className(), 'targetAttribute' => ['idEquipamento' => 'idEquipamento']],
        	[['idsmulticautela', 'nomeEquipamento', 'nomeProjeto'], 'safe'],	
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCautela' => 'Cod.',
            'NomeResponsavel' => 'Responsável',
            'OrigemCautela' => 'Origem',
            'DataDevolucao' => 'Data de Devolucao',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade',
            'TelefoneResponsavel' => 'Telefone',
            'ImagemCautela' => 'Imagem Cautela',
            'Equipamento' => 'Equipamento',
            'StatusCautela' => 'Status',
            'idEquipamento' => 'Cod. Equipamento',
            'idProjeto' => 'Projeto',
        	'idsmulticautela' => 'Cautelas',
        	'nomeEquipamento'=>'Nome Equip.',
        	'nomeProjeto'=>'Projeto',
        ];
    }
    
    public function getCautelatemequipamento(){
    	return $this->hasOne(Equipamento::className(),['idEquipamento'=>'idEquipamento']);
    }
    
    public function getNomeEquipamento(){
    	return $this->cautelatemequipamento->NomeEquipamento;
    }
    
    public function getCautelatemprojeto(){
    	return $this->hasOne(ContProjProjetos::className(),['id'=>'idProjeto']);
    }
    
    public static function getStatusAtraso(){
    	return "Em atraso";
    }
    
    public static function getStatusConcluida(){
    	return "Concluída";
    }
    
    public static function getStatusAberto(){
    	return "Em aberto";
    }
}
