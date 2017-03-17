<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $idestado
 * @property string $nome
 * @property string $sigla
 *
 * @property Cidade[] $cidades
 * @property Instituicao[] $instituicaos
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['sigla'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestado' => Yii::t('app', 'Idestado'),
            'nome' => Yii::t('app', 'Nome'),
            'sigla' => Yii::t('app', 'Sigla'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidades()
    {
        return $this->hasMany(Cidade::className(), ['estado_idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicaos()
    {
        return $this->hasMany(Instituicao::className(), ['estado_idestado' => 'idestado']);
    }
}
