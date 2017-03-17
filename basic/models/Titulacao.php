<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulacao".
 *
 * @property integer $idtitulacao
 * @property string $titulo
 *
 * @property Servidor[] $servidors
 */
class Titulacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtitulacao' => Yii::t('app', 'Idtitulacao'),
            'titulo' => Yii::t('app', 'Titulo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['titulacao_idtitulacao' => 'idtitulacao']);
    }
}
