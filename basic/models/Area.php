<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $idarea
 * @property string $nome
 *
 * @property Servidor[] $servidors
 */
class Area extends \yii\db\ActiveRecord
{
    public $layout = "mainUsuario"; 
    /**
     *
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idarea' => Yii::t('app', 'Idarea'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['area_idarea' => 'idarea']);
    }
}
