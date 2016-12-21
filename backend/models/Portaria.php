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
            [[/*'novoID',*/ 'ano','descricao', 'data', 'data0', 'documento'], 'required'],
            [['descricao', 'documento'], 'string'],
            [['data', 'data0'], 'safe'],
            //[['responsavel'], 'string', 'max' => 255],
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

    public function getNovoID(){
        $ultima_portaria= $this->find()->select('id')->where('ano = '.date('Y'))->orderBy(['id' => SORT_DESC])->limit(1)->one();
        
        if($ultima_portaria == null){
            return 1;
        }
        $novoID= $ultima_portaria->id + 1;

        return $novoID;
    }
}
