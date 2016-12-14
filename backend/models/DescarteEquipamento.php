<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_descarte_equipamento".
 *
 * @property integer $idEquipamento
 * @property integer $idDescarte
 * @property string $NomeResponsavel
 * @property string $email
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
            [['idEquipamento', 'NomeResponsavel', 'email', 'TelefoneResponsavel'], 'required'],
            [['idEquipamento'], 'integer'],
            [['NomeResponsavel', 'email'], 'string', 'max' => 50],
            [['TelefoneResponsavel'], 'string', 'max' => 20],
            [['ObservacoesDescarte'], 'string', 'max' => 100],
            [['idEquipamento'], 'exist', 'skipOnError' => true, 'targetClass' => 'app\models\j17_equipamento', 'targetAttribute' => ['idEquipamento' => 'idEquipamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEquipamento' => 'Id Equipamento',
            'idDescarte' => 'Id Descarte',
            'NomeResponsavel' => 'Nome Responsavel',
            'email' => 'Email',
            'TelefoneResponsavel' => 'Telefone Responsavel',
            'ObservacoesDescarte' => 'Observacoes Descarte',
        ];
    }
}
