<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\Expression;

/**
 * This is the model class for table "j17_equipamento".
 *
 * @property integer $idEquipamento
 * @property string $NomeEquipamento
 * @property string $Nserie
 * @property string $NotaFiscal
 * @property string $Localizacao
 * @property string $StatusEquipamento
 * @property string $OrigemEquipamento
 * @property string $ImagemEquipamento
 */
class Equipamento extends \yii\db\ActiveRecord
{

    public $file;
    public $tipoEquipamento;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_equipamento';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NomeEquipamento', 'NotaFiscal', 'Localizacao', 'StatusEquipamento', 'OrigemEquipamento'], 'required'],
            [['NomeEquipamento', 'Nserie', 'NotaFiscal', 'Localizacao', 'StatusEquipamento', 'OrigemEquipamento', 'ImagemEquipamento'], 'string', 'max' => 50],
        	[['ImagemEquipamento'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEquipamento' => 'Id Equipamento',
            'NomeEquipamento' => 'Nome do Equipamento',
            'Nserie' => 'Nº de Série',
            'NotaFiscal' => 'Nota Fiscal',
            'Localizacao' => 'Localização',
            'StatusEquipamento' => 'Status',
            'OrigemEquipamento' => 'Origem',
            'file' => 'Imagem Equipamento',
        ];
    }


     public function getTipoEquipamento(){

        if ($this->StatusEquipamento == "Disponível"){
            $tipoEquipamento = "Disponível";
        }
        else if ($this->StatusEquipamento == "Em uso"){
            $tipoEquipamento= "Em uso";
        }
        else if ($this->StatusEquipamento == "Descartado"){
            $tipoEquipamento = "Descartado";
        }

        return $tipoEquipamento;
    }


   public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
   
   public static function getEquipamentosDisponiveisAll(){
   	return Equipamento::find()->where("StatusEquipamento = \"".Equipamento::getStatusDisponivel()."\"")->all();
   }
   
   public static function getStatusDisponivel(){
   	return "Disponível";
   }
   
   public static function getStatusDescartado(){
   	return "Descartado";
   }
   
   public static function getStatusEmUso(){
   	return "Em uso";
   }
}
