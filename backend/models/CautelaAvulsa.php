<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel', 'ValidadeCautela'], 'required'],
            [['id', 'TelefoneResponsavel'], 'integer'],
            [['NomeResponsavel', 'Email', 'ValidadeCautela', 'ObservacoesDescarte', 'StatusCautelaAvulsa'], 'string', 'max' => 50],
            [['ImagemCautela'], 'string', 'max' => 100],
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
            'id' => 'ID',
            'NomeResponsavel' => 'Nome Responsavel',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade Cautela',
            'TelefoneResponsavel' => 'Telefone',
            'ObservacoesDescarte' => 'Observacoes',
            'ImagemCautela' => 'Imagem Cautela',
            'StatusCautelaAvulsa' => 'Status',
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
}
