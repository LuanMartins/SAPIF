<?php
/**
 * Created by PhpStorm.
 * User: Android008000
 * Date: 27/09/2016
 * Time: 21:09
 */

namespace app\filters;
use yii;
use yii\base\ActionFilter;
use app\models\Servidor;



class SelectUserFilter extends ActionFilter
{

    //public $visao;

    public function beforeAction($action)
    {
        $dados = Servidor::find()->joinWith('user')->where(['tem_cadastro'=>true, 'user_id'=>Yii::$app->user->getId()])->one();

        $action->controller->view->params['usuario'] = $dados;
        return parent::beforeAction($action);
    }


    
}