<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_descarte_equipamento".
 *
 * @property integer $idDescarte
 * @property string $NomeResponsavel
 * @property string $Email
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
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel'], 'required'],
            [['NomeResponsavel', 'Email', 'TelefoneResponsavel'], 'string', 'max' => 50],
            [['ObservacoesDescarte'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDescarte' => 'Id Descarte',
            'NomeResponsavel' => 'Nome Responsavel',
            'Email' => 'Email',
            'TelefoneResponsavel' => 'Telefone Responsavel',
            'ObservacoesDescarte' => 'Observacoes Descarte',
        ];
    }
}
