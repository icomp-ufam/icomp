<?php

namespace backend\models;

use Yii;


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
 * @property integer $idProjeto
 */
class Equipamento extends \yii\db\ActiveRecord
{
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
            [['idProjeto'], 'integer'],
            [['NomeEquipamento', 'Nserie', 'NotaFiscal', 'Localizacao', 'StatusEquipamento', 'OrigemEquipamento', 'ImagemEquipamento'], 'string', 'max' => 50],
            [['idProjeto'], 'exist', 'skipOnError' => true, 'targetClass' => ContProjProjetos::className(), 'targetAttribute' => ['idProjeto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEquipamento' => 'Equipamento',
            'NomeEquipamento' => 'Equipamento',
            'Nserie' => 'N° serie',
            'NotaFiscal' => 'Nota Fiscal',
            'Localizacao' => 'Localizacao',
            'StatusEquipamento' => 'Status',
            'OrigemEquipamento' => 'Origem',
            'ImagemEquipamento' => 'Imagem',
            'idProjeto' => 'Projeto',
        ];
    }
}
