<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_descarte_equipamento".
 *
 * @property integer $idDescarte
 * @property string $NomeResponsavel
 * @property string $Email
 * @property string $TelefoneResponsavel
 * @property string $ObservacoesDescarte
 */
class DescarteEquipamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_descarte_equipamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel'], 'required'],
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel'], 'string', 'max' => 50],
        	[['Email'], 'email'],
            [['ObservacoesDescarte'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDescarte' => 'Id Descarte',
            'NomeResponsavel' => 'Responsável',
            'Email' => 'Email',
            'TelefoneResponsavel' => 'Telefone',
            'ObservacoesDescarte' => 'Observacões do Descarte',
        ];
    }
    
    public function getTelefoneFormatado(){
    	 
    	return preg_replace('/(\d{2})(\d{5})(\d{3})/i', '(${1}) ${2}-${3}', $this->TelefoneResponsavel);
    }
    
    public function beforeSave($insert){
    	 
    	$this->TelefoneResponsavel = str_replace(["(",")","-"," "],"",$this->TelefoneResponsavel);
    	 
    	return true;
    }
}
