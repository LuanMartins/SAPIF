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
use yii\web\ForbiddenHttpException; 



class AdminFilter extends ActionFilter
{

    //public $visao;

    public function beforeAction($action)
    {
        {
            if (!yii::$app->user->can("admin")) {


                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            
            }
        }
        return parent::beforeAction($action);
    
    }
    
}