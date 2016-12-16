<?php

namespace app\models;

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
            [['NomeResponsavel', 'OrigemCautela', 'DataDevolucao', 'Email', 'ValidadeCautela', 'TelefoneResponsavel', 'Equipamento', 'StatusCautela'], 'string', 'max' => 50],
            [['ImagemCautela'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCautela' => 'Id Cautela',
            'NomeResponsavel' => 'Nome Responsavel',
            'OrigemCautela' => 'Origem Cautela',
            'DataDevolucao' => 'Data Devolucao',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade Cautela',
            'TelefoneResponsavel' => 'Telefone Responsavel',
            'ImagemCautela' => 'Imagem Cautela',
            'Equipamento' => 'Equipamento',
            'StatusCautela' => 'Status Cautela',
        ];
    }
}
