<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicao".
 *
 * @property integer $idinstituicao
 * @property string $nome
 * @property string $sigla
 * @property integer $estado_idestado
 *
 * @property Campus[] $campuses
 * @property Estado $estadoIdestado
 * @property Servidor[] $servidors
 */
class Instituicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'estado_idestado'], 'required'],
            [['estado_idestado'], 'integer'],
            [['nome'], 'string', 'max' => 200],
            [['sigla'], 'string', 'max' => 4],
            [['estado_idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_idestado' => 'idestado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinstituicao' => Yii::t('app', 'Idinstituicao'),
            'nome' => Yii::t('app', 'Nome'),
            'sigla' => Yii::t('app', 'Sigla'),
            'estado_idestado' => Yii::t('app', 'Estado '),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampuses()
    {
        return $this->hasMany(Campus::className(), ['instituicao_idinstituicao1' => 'idinstituicao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoIdestado()
    {
        return $this->hasOne(Estado::className(), ['idestado' => 'estado_idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['instituicao_idinstituicao' => 'idinstituicao']);
    }
}
