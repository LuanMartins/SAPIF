<?php

namespace app\controllers;

use Yii;
use app\models\Interesse;
use app\models\InteresseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * InteresseController implements the CRUD actions for Interesse model.
 */
class InteresseController extends Controller
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

    /**
     * Lists all Interesse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InteresseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Interesse model.
     * @param integer $servidor_idservidores
     * @param integer $campus_idcampus
     * @return mixed
     */
    public function actionView($servidor_idservidores, $campus_idcampus)
    {
        return $this->render('view', [
            'model' => $this->findModel($servidor_idservidores, $campus_idcampus),
        ]);
    }

    /**
     * Creates a new Interesse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Interesse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'servidor_idservidores' => $model->servidor_idservidores, 'campus_idcampus' => $model->campus_idcampus]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Interesse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $servidor_idservidores
     * @param integer $campus_idcampus
     * @return mixed
     */
    public function actionUpdate($servidor_idservidores, $campus_idcampus)
    {
        $model = $this->findModel($servidor_idservidores, $campus_idcampus);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'servidor_idservidores' => $model->servidor_idservidores, 'campus_idcampus' => $model->campus_idcampus]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Interesse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $servidor_idservidores
     * @param integer $campus_idcampus
     * @return mixed
     */
    public function actionDelete($servidor_idservidores, $campus_idcampus)
    {
        $this->findModel($servidor_idservidores, $campus_idcampus)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Interesse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $servidor_idservidores
     * @param integer $campus_idcampus
     * @return Interesse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($servidor_idservidores, $campus_idcampus)
    {
        if (($model = Interesse::findOne(['servidor_idservidores' => $servidor_idservidores, 'campus_idcampus' => $campus_idcampus])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
