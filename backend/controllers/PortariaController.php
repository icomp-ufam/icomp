<?php

namespace backend\controllers;

use Yii;
use app\models\Portaria;
use app\models\PortariaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * PortariaController implements the CRUD actions for Portaria model.
 */
class PortariaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    protected function mensagens($tipo, $titulo, $mensagem){
        Yii::$app->session->setFlash($tipo, [
            'type' => $tipo,
            'icon' => 'home',
            'duration' => 5000,
            'message' => $mensagem,
            'title' => $titulo,
            'positonY' => 'top',
            'positonX' => 'center',
            'showProgressbar' => true,
        ]);
    }

    /**
     * Lists all Portaria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortariaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portaria model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
    * Creates a new Portaria model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        $model = new Portaria();

        $model->data = date("Y-m-d");
        $model->data0 = date('d/m/Y', strtotime($model->data));

        if ($model->load(Yii::$app->request->post())) {

            //Required to adapt the date inserted in the view to the format that will be inserted into the database
            $model->data = explode("/", $model->data0);
            if (sizeof($model->data) == 3) {
                $model->data = $model->data[2]."-".$model->data[1]."-".$model->data[0];
            }
            else $model->data = '';

            $pre_path = 'uploads/portaria/';
            $filename = 'portaria-'.Yii::$app->security->generateRandomString().'.pdf';

            $path = $pre_path.$filename;
            
            $model->documento = $path;

            if($model->save()){

                if (!is_dir($pre_path)) {
                    mkdir($pre_path);
                }

                $this->generatePdf($model, $path);
                $this->mensagens('success', 'Sucesso', 'Portaria criada com sucesso.');

                return $this->redirect(['portaria/view', 'id'=>$model->id]);
            }
            else {
                $this->mensagens('error', 'Erro', 'Houve uma falha ao criar a portaria.');
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
    }

    /**
     * Updates an existing Portaria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Portaria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portaria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portaria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portaria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function generatePdf($model, $filename) {
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_FILE,
            'filename' => $filename,
            // your html content input
            'content' => '
                            <table style="width: 647px;" cellspacing="1" cellpadding="5">
                            <tbody>
                            <tr>
                            <td style="width: 104px;" valign="top" height="89">
                            <p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;"><strong><img src='.getcwd().'/img/ufam.jpg alt="" width="82" height="106" /></strong></span></span></p>
                            </td>
                            <td style="width: 542px;" valign="top" height="89">
                            <p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;"><strong>UNIVERSIDADE FEDERAL DO AMAZONAS</strong></span></span></p>
                            <p><span style="font-size: small;"><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;">Instituto de Computa&ccedil;&atilde;o</span></span></span></p>
                            <p><span style="font-family: \'Arial Narrow\', sans-serif;"><span style="font-size: large;">Programa de P&oacute;s-Gradua&ccedil;&atilde;o em Inform&aacute;tica</span></span></p>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <p class="western" align="center">&nbsp;</p>
                            <p class="western" align="center">&nbsp;</p>
                            <p class="western" align="center"><span style="font-family: Arial, sans-serif;"><span style="font-size: small;"><strong>Solicita&ccedil;&atilde;o de Prorroga&ccedil;&atilde;o</strong></span></span></p>
                            <p class="western">&nbsp;</p>
                            <p class="western">&nbsp;</p>
                            <p class="western">&nbsp;</p>
                            <p class="western"><span style="font-size: small;"><span style="font-family: Arial, sans-serif;"><b>De</b>:</span></span></p>
                            <p class="western"><span style="font-size: small;"><span style="font-family: Arial, sans-serif;"><b>Matr&iacute;cula</b>:</span></span></p>
                            <p class="western"><span style="font-size: small;"><span style="font-family: Arial, sans-serif;"><b>Para</b>: Coordena&ccedil;&atilde;o do Programa de P&oacute;s-Gradua&ccedil;&atilde;o Em Inform&aacute;tica &ndash; PPGI/UFAM</span></span></p>
                            <p class="western">&nbsp;</p>
                            <p class="western"><span style="font-size: small;"><span style="font-family: Arial, sans-serif;">Solicito a PRORROGA&Ccedil;&Atilde;O do prazo para minhaDefesa de Disserta&ccedil;&atilde;o</span><span style="font-family: Arial, sans-serif;">por <b></b> dias à partir do dia <b></b></span><span style="font-family: Arial, sans-serif;">.</span></span></p>
                            <p class="western">&nbsp;</p>
                            <p class="western"><span style="font-family: Arial, sans-serif;"><span style="font-size: small;"><b>Justificativa</b>:<br>&nbsp;</span></span></p>
                            <p class="western">&nbsp;</p>
                            <p class="western">Anexo (Vers&atilde;o atual da Disserta&ccedil;&atilde;o/Tese/Artigos com o novo cronograma detalhado considerando o per&iacute;odo de prorroga&ccedil;&atilde;o ou trancamento):&nbsp;</p>
                            <p class="western">&nbsp;</p>
                            <p style="text-align: right;">&nbsp;</p>
                            <p style="text-align: right;">&nbsp;</p>
                            <p style="text-align: right;"><span style="font-family: Arial, sans-serif;"><span style="font-size: small;">Data:</span></span></p>
                            <p class="western">&nbsp;</p>
                            <p class="western">&nbsp;</p>
                            <p class="western">&nbsp;</p>
                            <table style="margin-left: auto; margin-right: auto; width: 518.5px;">
                            <tbody>
                            <tr style="height: 21px;">
                            <td style="height: 21px; width: 207px;">--------------------------------------------</td>
                            <td style="height: 21px; width: 100px;">&nbsp;</td>
                            <td style="height: 21px; width: 209.5px; text-align: right;">--------------------------------------------</td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="height: 21px; width: 207px;">Orientador</td>
                            <td style="height: 21px; width: 100px;">&nbsp;</td>
                            <td style="text-align: right; height: 21px; width: 209.5px;">Discente</td>
                            </tr>
                            </tbody>
                            </table>
                            <p class="western" align="center">&nbsp;</p>
                            <p class="western" align="center">&nbsp;</p>
                         '
            ,  
            //'cssInline' => '', 
             // set mPDF properties on the fly
            'options' => ['title' => $filename],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetFooter'=>[
                '
                   <p align="center"><span style="font-family: Arial, sans-serif;"><span style="font-size: xx-small;">Av. Gal. Rodrigo Oct&aacute;vio Jord&atilde;o Ramos, 6200 CEP.:69077-000 Manaus &ndash;AM</span></span></p>
                    <p align="center"><span style="font-family: Arial, sans-serif;"><span style="font-size: xx-small;"> Fone: 3305 2809 / 2808 / 1193 e-mail: secretariappgi@icomp.ufam.edu.br</span></span></p>
                    <p align="center">&nbsp;</p>
                '
                ],
            ]
        ]);

        return $pdf->render();
    }
}
