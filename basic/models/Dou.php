<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dou".
 *
 * @property integer $iddou
 * @property integer $pagina
 * @property integer $secao
 * @property string $data
 * @property integer $numero_vaga
 * @property integer $pos_concurso
 * @property integer $edicao
 *
 * @property Servidor[] $servidors
 */
class Dou extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dou';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pagina', 'secao', 'data', 'numero_vaga', 'pos_concurso', 'edicao'], 'required'],
            [['pagina', 'secao', 'numero_vaga', 'pos_concurso', 'edicao'], 'integer'],
            [['data'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddou' => Yii::t('app', 'Iddou'),
            'pagina' => Yii::t('app', 'Pagina'),
            'secao' => Yii::t('app', 'Secao'),
            'data' => Yii::t('app', 'Data'),
            'numero_vaga' => Yii::t('app', 'Numero Vaga'),
            'pos_concurso' => Yii::t('app', 'Pos Concurso'),
            'edicao' => Yii::t('app', 'Edicao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['dou_iddou' => 'iddou']);
    }
}
