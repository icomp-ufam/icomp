<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use app\models\User;

/**
 * This is the model class for table "j17_cautela_avulsa".
 *
 * @property integer $idCautelaAvulsa
 * @property integer $id
 * @property string $NomeResponsavel
 * @property string $Email
 * @property string $ValidadeCautela
 * @property integer $TelefoneResponsavel
 * @property string $ObservacoesDescarte
 * @property string $ImagemCautela
 * @property string $StatusCautelaAvulsa
 */
class CautelaAvulsa extends \yii\db\ActiveRecord
{

    public $tipoCautelaAvulsa;
    public $flagCautelaAvulsa=0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_cautela_avulsa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel', 'ValidadeCautela', 'NomeEquipamento'], 'required'],
            [['id',], 'integer'],
        	[['TelefoneResponsavel'], 'string', 'max'=>15, 'min'=>11],
            [['NomeResponsavel', 'Email', 'ValidadeCautela', 'ObservacoesDescarte', 'StatusCautelaAvulsa', 'origem', 'NomeEquipamento'], 'string', 'max' => 50],
            [['ImagemCautela'], 'string', 'max' => 100],
        	[['Email'], 'email'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCautelaAvulsa' => 'Cod. Cautela Avulsa',
            'id' => 'Usuário do Sistema',
            'NomeResponsavel' => 'Nome Responsavel',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade Cautela',
            'TelefoneResponsavel' => 'Telefone',
            'ObservacoesDescarte' => 'Observacoes',
            'ImagemCautela' => 'Imagem Cautela',
            'StatusCautelaAvulsa' => 'Status',
        	'origem' => 'Origem',
        	'NomeEquipamento'=>'Equipamento',
        ];
    }

    public function getTipoCautelaAvulsa(){

        if ($this->StatusCautelaAvulsa == "Em aberto"){
            $tipoCautelaAvulsa = "Em aberto";
        }
        else if ($this->StatusCautelaAvulsa == "Concluída"){
            $tipoCautelaAvulsa = "Concluída";
        }
        else if ($this->StatusCautelaAvulsa == "Em atraso"){
            $tipoCautelaAvulsa = "Em atraso";
        }

        return $tipoCautelaAvulsa;
    }
    
    public function getCautelaAvulsaTemUsuario(){
    	
    	return $this->hasOne(User::className(), ["id" => "id"]);
    }
    
    public function getTelefoneFormatado(){
    	
    	return preg_replace('/(\d{2})(\d{5})(\d{3})/i', '(${1}) ${2}-${3}', $this->TelefoneResponsavel);
    }
    
    public function beforeSave($insert){
    	
    	$this->TelefoneResponsavel = str_replace(["(",")","-"," "],"",$this->TelefoneResponsavel);
    	
    	return true;
    }
}
