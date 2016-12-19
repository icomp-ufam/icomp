<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_portaria".
 *
 * @property integer $id
 * @property string $responsavel
 * @property string $descricao
 * @property string $data
 * @property string $documento
 */
class Portaria extends \yii\db\ActiveRecord
{
    public $data0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_portaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'responsavel', 'descricao', 'data', 'data0', 'documento'], 'required'],
            [['id'], 'integer'],
            [['descricao', 'documento'], 'string'],
            [['data', 'data0'], 'safe'],
            [['responsavel'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Número',
            'responsavel' => 'Responsável',
            'descricao' => 'Descrição',
            'data' => 'Data',
            'data0' => 'Data',
            'documento' => 'Documento',
        ];
    }
}
