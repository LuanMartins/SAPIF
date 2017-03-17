<?php

namespace app\components;

use Yii;
use yii\base\ActionFilter;
use yii\web\HttpException;

class AccessFilter extends ActionFilter
{
public $actions;
    public function beforeAction($action)
    {

       if (isset($this->actions[$action->id])) {

           if (!\Yii::$app->user->can($this->actions[$action->id])) {

           }
           
       }else {
           throw new HttpException(403,'Acesso negado.');
       }
        return parent::beforeAction($action);
    }

}




?>