<?php

namespace app\models;

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
            [['NomeEquipamento', 'Nserie', 'NotaFiscal', 'Localizacao', 'StatusEquipamento', 'OrigemEquipamento', 'ImagemEquipamento'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEquipamento' => 'Id Equipamento',
            'NomeEquipamento' => 'Nome Equipamento',
            'Nserie' => 'Nserie',
            'NotaFiscal' => 'Nota Fiscal',
            'Localizacao' => 'Localizacao',
            'StatusEquipamento' => 'Status Equipamento',
            'OrigemEquipamento' => 'Origem Equipamento',
            'ImagemEquipamento' => 'Imagem Equipamento',
        ];
    }
}
