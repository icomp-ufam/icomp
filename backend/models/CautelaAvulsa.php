<?php

namespace app\models;

use Yii;

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
 */
class CautelaAvulsa extends \yii\db\ActiveRecord
{
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
            [['id', 'NomeResponsavel', 'Email', 'TelefoneResponsavel', 'ObservacoesDescarte'], 'required'],
            [['id', 'TelefoneResponsavel'], 'integer'],
            [['NomeResponsavel', 'Email', 'ValidadeCautela', 'ObservacoesDescarte'], 'string', 'max' => 50],
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
            'idCautelaAvulsa' => 'Id Cautela Avulsa',
            'id' => 'Id do Responsável',
            'NomeResponsavel' => 'Nome do Responsável',
            'Email' => 'Email',
            'ValidadeCautela' => 'Validade Cautela',
            'TelefoneResponsavel' => 'Telefone do Responsável',
            'ObservacoesDescarte' => 'Observações',
            'ImagemCautela' => 'Imagem Cautela',
        ];
    }
}