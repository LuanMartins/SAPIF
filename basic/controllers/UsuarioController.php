<?php

namespace app\controllers;

use app\filters\SelectUserFilter;
use app\models\Dou;
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
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class UsuarioController extends Controller
{



    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['cadastro','principal','pesquisa','pesquisar','mensagem','view-servidor'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
            return $this->redirect(url::toRoute('usuario'));
        }

        return $this->render('/site/index');
    }

    // public function actionTeste(){

    // $this->layout = 'mainUsuario';


    //return $this->render('usuario');


    // }



    public function actionCadastro()
    {
        $this->layout = "cadastrolayout";
        $validacao = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();


        if($validacao != null){


            $this->redirect('/site/error');

        }


        $model = new Servidor();
        $modelDou = new Dou();
        $modelInteresse = new Interesse();
        $conexao = \Yii::$app->db;

        
        // provavelmente nao ira precisar dessa consulta
        //$user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $modelInteresse->load(yii::$app->request->post()) &&
            $modelDou->load(Yii::$app->request->post()) && $modelDou->validate()) {



            $transacao = $conexao->beginTransaction();

            try{
                $modelDou->save();
                
                $model->dou_iddou = $modelDou->iddou;
                $model->save();
                // falar com keylly para inserir o id do servidor para a tabela de interesse
                //$modelInteresse->save();
                $conexao->createCommand("UPDATE user SET tem_cadastro = TRUE where id=".Yii::$app->user->getId())->execute();
                $conexao->createCommand("INSERT INTO interesse values(".$model->idservidores.",".$modelInteresse->campus_idcampus.")")->execute();
                //$conexao->createCommand("INSERT INTO interesse VALUES(".$this->$model->idservidores.",".")");
                $transacao->commit();

                //return $model->idservidores;
                $this->layout = 'mainUsuario';
                return $this->redirect('principal');

            }catch (\yii\db\Exception $e){

                $transacao->rollBack();
                throw  $e;
            }


            // form inputs are valid, do something here
            // vai redirecionar para  a pagina principal do usuario




            // return $this->redirect('error');

        }

        return $this->render('cadastro', [
            'model' => $model,
            'modelInteresse' => $modelInteresse,
            'modelDou' => $modelDou


        ]);
    }



    public function actionPrincipal(){

        $model = new Servidor();
        $modelDou = new Dou();
        $modelInteresse = new Interesse();

//        $informacao = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();

        $informacao = Servidor::find()->joinWith('user')->joinWith('campusIdcampus as campus')->joinWith('areaIdarea as area')->joinWith('regimeIdregime as regime')
            ->joinWith('instituicaoIdinstituicao as instituicao')->joinWith('douIddou')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();
       // $dou = Servidor::find()->joinWith('douIddou as dou')->where(['user_id'=>Yii::$app->user->getId()])->one();


        $this->layout = 'mainUsuario';
        // $this->view->params['usuario'] = $dados;

        return $this->render('usuario',[

            'informacao' => $informacao,
            'model' => $model,
            'modelInteresse' => $modelInteresse,
            'modelDou' => $modelDou,
            ]);



    }
    public function actionPesquisa(){

        $informacao = Servidor::find()->joinWith('user')->joinWith('campusIdcampuses as campus')->joinWith('areaIdarea as area')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();

        $data = ArrayHelper::map(Campus::find()->all(),'nome_campus','nome_campus');
        $this->layout = 'mainUsuario';


        return $this->render('pesquisa',['informacao' => $informacao,'data' => $data]);

    }


    public function actionPesquisar($campus,$idcampus,$area){



        $this->layout = 'mainUsuario';

        $model = new ContactForm();

        $consulta = Servidor::find()->joinWith('user')->joinWith('campusIdcampuses campus')->joinWith('areaIdarea  area')->joinWith('interesses  i')
            ->where(['campus.nome_campus' => $campus,'i.campus_idcampus'=>$idcampus,'area.nome'=>$area]);
        $count = $consulta->count();
        $pages = new Pagination(['totalCount'=> $count]);
        $models = $consulta->offset($pages->offset)->limit($pages->limit)->all();



        $consulta2 = Servidor::find()->joinWith('user')
            ->where(['user_id'=>Yii::$app->user->getId()])->one();

        return $this->render('resultado',['models' => $models, 'consulta2'=>$consulta2,'model'=>$model,'pages'=>$pages
        ]);
       //return $this->redirect('principal',['consulta'=>$consulta]);
        //implementar consulta para pesquisar sobre os servidores que tem interesse


    }


    public function actionMensagem(){


        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())&&$model->validate()) {

            $servidor = Servidor::find()->joinWith('user')->where(['id' => Yii::$app->user->getId()])->one();

            Yii::$app->mailer->compose('sgpif',['mensagem' => $model->mensagem, 'idServidor' => $servidor->idservidores,'nome' => $servidor->nome])
                ->setTo($model->emailReceptor)
                ->setFrom(["sgpif@site.com"])
                ->setSubject("Interesse em Realizar Permuta")
                ->setTextBody($model->mensagem)
                ->send();

            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->redirect('principal');
        }

    }


    /**
     * esta funcao deve retornar uma tela com o usuario no qual se quer conhecer ou mandar mensagem
     * para assim entao entrar em contato
     */
    public function actionViewServidor($id){


        $model = new ContactForm();
        $modelDou = new Dou();
        $modelInteresse = new Interesse();

//        $informacao = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();


        $consulta2 = Servidor::find()->joinWith('user')
            ->where(['user_id'=>Yii::$app->user->getId()])->one();
        $informacao = Servidor::find()->joinWith('user')->joinWith('campusIdcampus as campus')->joinWith('areaIdarea as area')->joinWith('regimeIdregime as regime')
            ->joinWith('instituicaoIdinstituicao as instituicao')->joinWith('douIddou as dou')->where(['tem_cadastro'=>true, 'idservidores' => $id])->one();
        // $dou = Servidor::find()->joinWith('douIddou as dou')->where(['user_id'=>Yii::$app->user->getId()])->one();


        $this->layout = 'mainUsuario';
        // $this->view->params['usuario'] = $dados;

        return $this->render('servidor',[

            'informacao' => $informacao,
            'model' => $model,
            'modelInteresse' => $modelInteresse,
            'modelDou' => $modelDou,
            'consulta2' => $consulta2,
        ]);

    }


}
