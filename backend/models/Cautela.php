<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_cautela".
 *
 * @property string $IdCautela
 * @property string $NomeResponsavel
 * @property string $OrigemCautela
 * @property string $DataDevolucao
 * @property resource $ImagemCautela
 * @property string $Email
 * @property string $ValidadeCautela
 * @property integer $TelefoneResponsavel
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
            [['IdCautela', 'NomeResponsavel', 'OrigemCautela', 'DataDevolucao', 'ImagemCautela', 'Email', 'TelefoneResponsavel'], 'required'],
            [['DataDevolucao'], 'safe'],
            [['ImagemCautela'], 'string'],
            [['TelefoneResponsavel'], 'integer'],
            [['IdCautela'], 'string', 'max' => 20],
            [['NomeResponsavel', 'OrigemCautela', 'Email', 'ValidadeCautela'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdCautela' => 'Id Cautela',
            'NomeResponsavel' => 'Nome Responsavel',
            'OrigemCautela' => 'Origem Cautela',
            'DataDevolucao' => 'Data Devolucao',
            'ImagemCautela' => 'Imagem Cautela',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade Cautela',
            'TelefoneResponsavel' => 'Telefone Responsavel',
        ];
    }
}
