<?php

namespace backend\models;

use Yii;

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
            [['NomeResponsavel', 'OrigemCautela', 'Email', 'TelefoneResponsavel', 'StatusCautela'], 'required'],
            [['idEquipamento', 'idProjeto'], 'integer'],
            [['NomeResponsavel', 'OrigemCautela', 'DataDevolucao', 'Email', 'ValidadeCautela', 'TelefoneResponsavel', 'Equipamento', 'StatusCautela'], 'string', 'max' => 50],
            [['ImagemCautela'], 'string', 'max' => 100],
            [['idEquipamento'], 'exist', 'skipOnError' => true, 'targetClass' => Equipamento::className(), 'targetAttribute' => ['idEquipamento' => 'idEquipamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCautela' => 'Id',
            'NomeResponsavel' => 'Responsável',
            'OrigemCautela' => 'Origem',
            'DataDevolucao' => 'Data de Devolucao',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade',
            'TelefoneResponsavel' => 'Telefone',
            'ImagemCautela' => 'Imagem Cautela',
            'Equipamento' => 'Equipamento',
            'StatusCautela' => 'Status',
            'idEquipamento' => 'Equipamento',
            'idProjeto' => 'Projeto',
        ];
    }
}
