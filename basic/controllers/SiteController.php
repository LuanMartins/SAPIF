<?php

namespace app\controllers;

use app\filters\SelectUserFilter;
use app\models\Interesse;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Servidor;
use app\models\Regime;
use app\models\Instituicao;
use app\models\Titulacao;
use app\models\Campus;
use app\models\Area;
use yii\db\Query;
use yii\helpers\Url;
use yii\db\ActiveRecord;
use amnah\yii2\user\models\User;

class SiteController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],

            'select' => [

                'class' => SelectUserFilter::className(),

                ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        
        $checagem = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();
        if($checagem != null) {
            return $this->redirect(url::toRoute('/usuario/principal'));
        }

            return $this->render('index');
    }

   // public function actionTeste(){

   // $this->layout = 'mainUsuario';


    //return $this->render('usuario');


   // }
    public function actionListaRegime($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idregime AS id, nome_regime AS text')
                ->from('regime')
                ->where(['like', 'nome_regime', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Regime::find($id)->nome_regime];
        }
        return $out;
    }


    public function actionListaInstituicao($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idinstituicao AS id, nome AS text')
                ->from('instituicao')
                ->where(['like', 'nome', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Instituicao::find($id)->nome];
        }
        return $out;
    }

    public function actionListaTitulacao($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idtitulacao AS id, titulo AS text')
                ->from('titulacao')
                ->where(['like', 'titulo', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Titulacao::find($id)->titulo];
        }
        return $out;
    }


    public function actionListaCampusInteresse($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idcampus AS id, nome_campus AS text')
                ->from('campus')
                ->where(['like', 'nome_campus', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Campus::find($id)->titulo];
        }
        return $out;
    }

    public function actionListaCampus($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idcampus AS id, nome_campus AS text')
                ->from('campus')
                ->where(['like', 'nome_campus', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Campus::find($id)->titulo];
        }
        return $out;
    }

    public function actionListaArea($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('idarea AS id, nome AS text')
                ->from('area')
                ->where(['like', 'nome', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Area::find($id)->nome];
        }
        return $out;
    }

    
    public function actionPrincipal(){


        $this->layout = 'mainUsuario';


        return $this->render('principal');


    }
    public function actionUsuario(){

        $dados = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();

        $this->layout = 'mainUsuario';
       // $this->view->params['usuario'] = $dados;

        return $this->render('usuario');
    }



    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
