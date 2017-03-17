<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cidade".
 *
 * @property integer $idcidade
 * @property string $nome
 * @property integer $estado_idestado
 *
 * @property Estado $estadoIdestado
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cidade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'estado_idestado'], 'required'],
            [['estado_idestado'], 'integer'],
            [['nome'], 'string', 'max' => 150],
            [['estado_idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_idestado' => 'idestado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcidade' => Yii::t('app', 'Idcidade'),
            'nome' => Yii::t('app', 'Nome'),
            'estado_idestado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoIdestado()
    {
        return $this->hasOne(Estado::className(), ['idestado' => 'estado_idestado']);
    }
}
