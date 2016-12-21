<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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

     public $tipoCautela;
     public $flagCautela=0;

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
            'idCautela' => 'N° Cautela',
            'NomeResponsavel' => 'Responsavel',
            'OrigemCautela' => 'Origem',
            'DataDevolucao' => 'Data Devolucao',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validadea',
            'TelefoneResponsavel' => 'Telefone',
            'ImagemCautela' => 'Local',
            'Equipamento' => 'Equipamento',
            'StatusCautela' => 'Status',
        ];
    }


    public function getTipoCautela(){

        if ($this->StatusCautela == "Em aberto"){
            $tipoCautela = "Em aberto";
        }
        else if ($this->StatusCautela == "Concluída"){
            $tipoCautela = "Concluída";
        }
        else if ($this->StatusCautela == "Em atraso"){
            $tipoCautela = "Em atraso";
        }

        return $tipoCautela;
    }

}
