<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{



    public $emailReceptor;
    public $mensagem;




    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['emailReceptor','mensagem'], 'required'],
            // email has to be a valid email address
            [['emailReceptor'], 'email'],
            // verifyCode needs to be entered correctly

            // name, email, subject and body are required

            // email has to be a valid email address

            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [

        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($this->emailReceptor)
                ->setFrom([$this->emailEmisor])
                ->setSubject("Interesse em Realizar Permuta")
                ->setTextBody($this->body)
                ->send();

            return 323232;
        }
        return 121;
    }
}
