<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_prorrogacoes".
 *
 * @property integer $id
 * @property integer $idAluno
 * @property string $dataSolicitacao
 * @property integer $qtdDias
 * @property string $justificativa
 * @property string $previa
 * @property integer $status
 */
class Prorrogacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_prorrogacoes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idAluno', 'dataSolicitacao', 'qtdDias', 'justificativa', 'previa', 'status'], 'required'],
            [['id', 'idAluno', 'qtdDias', 'status'], 'integer'],
            [['dataSolicitacao'], 'safe'],
            [['justificativa', 'previa'], 'string'],
            [['idAluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['idAluno' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAluno' => 'Id Aluno',
            'dataSolicitacao' => 'Data Solicitacao',
            'qtdDias' => 'Qtd Dias',
            'justificativa' => 'Justificativa',
            'previa' => 'Previa',
            'status' => 'Status',
        ];
    }
}
