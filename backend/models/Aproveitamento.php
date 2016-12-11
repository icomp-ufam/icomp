<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_aproveitamento".
 *
 * @property integer $id
 * @property string $codDisciplinaOrigemFK
 * @property string $codDisciplinaDestinoFK
 * @property double $nota
 * @property double $frequencia
 * @property string $situacao
 * @property integer $idAluno
 *
 * @property J17Disciplina $codDisciplinaDestinoFK0
 * @property J17Disciplina $codDisciplinaOrigemFK0
 */
class Aproveitamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_aproveitamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codDisciplinaOrigemFK', 'codDisciplinaDestinoFK', 'nota', 'frequencia', 'situacao', 'idAluno'], 'required'],
            [['nota', 'frequencia'], 'number'],
            [['idAluno'], 'integer'],
            [['codDisciplinaOrigemFK', 'codDisciplinaDestinoFK', 'situacao'], 'string', 'max' => 10],
            [['codDisciplinaDestinoFK'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['codDisciplinaDestinoFK' => 'codDisciplina']],
            [['codDisciplinaOrigemFK'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['codDisciplinaOrigemFK' => 'codDisciplina']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codDisciplinaOrigemFK' => 'Cód. Disciplina Origem',
            'codDisciplinaDestinoFK' => 'Cód. Disciplina Destino',
            'nota' => 'Nota',
            'frequencia' => 'Frequência',
            'situacao' => 'Situação',
            'idAluno' => 'ID Aluno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodDisciplinaDestinoFK()
    {
        return $this->hasOne(Disciplina::className(), ['codDisciplina' => 'codDisciplinaDestinoFK']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodDisciplinaOrigemFK()
    {
        return $this->hasOne(Disciplina::className(), ['codDisciplina' => 'codDisciplinaOrigemFK']);
    }
}
