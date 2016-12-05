<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j17_trancamentos".
 * Part of this class was self-generated by the Framework
 * 
 * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
 *
 * @property integer $id
 * @property integer $idAluno
 * @property string $dataSolicitacao
 * @property string $dataInicio
 * @property string $prevTermino
 * @property string $dataTermino
 * @property string $justificativa
 * @property string $documento
 * @property integer $status
 * 
 * Obtained through relationships:
 * 
 * @property Aluno $aluno
 * @property User $orientador0
 * 
 * Symbolic, responsible for business rules and search:
 * 
 * @property yii\web\UploadedFile documento0
 * @property string orientador
 * @property string matricula
 * @property string dataInicio0
 * @property string prevTermino0
 */
class Trancamento extends \yii\db\ActiveRecord
{
    public $documento0;
    public $orientador;
    public $matricula;
    public $dataInicio0;
    public $prevTermino0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'j17_trancamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAluno', /*'dataSolicitacao',*/ 'dataInicio', 'prevTermino', /*'dataTermino',*/ 'justificativa', 'documento', /*'tipo', 'status'*/], 'required'],
            [['idAluno', 'tipo', 'status'], 'integer'],
            [['matricula', 'orientador','dataSolicitacao', 'dataInicio', 'prevTermino', 'dataTermino'], 'safe'],
            [['dataInicio0', 'prevTermino0'], 'date', 'format' => 'php:d/m/Y'],
            [['documento'], 'string'],
            [['documento0'], 'file', 'extensions' => 'pdf'],
            [['justificativa'], 'string', 'max' => 250],
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
            'idAluno' => 'Nome',
            'matricula' => 'Matrícula',
            'dataSolicitacao' => 'Data Solicitação',
            'dataInicio' => 'Início',
            'dataInicio0' => 'Início',
            'orientador' => 'Orientador',
            'prevTermino' => 'Prev. Término',
            'dataTermino' => 'Data Término',
            'justificativa' => 'Justificativa',
            'documento' => 'Documento',
            'tipo' => 'Tipo',
            'status' => 'Status',
        ];
    }

    /**
     * Gets the student object
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['id' => 'idAluno']);
    }

    /**
     * Gets the advisor object
     * 
     * @author Pedro Frota <pvmf@icomp.ufam.edu.br>
     * 
     * @return \yii\db\ActiveQuery
     */

    public function getOrientador0() {
        return $this->hasOne(User::className(), ['id' => 'orientador'])->via('aluno');
    }
}
