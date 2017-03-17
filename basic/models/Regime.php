<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regime".
 *
 * @property integer $idregime
 * @property string $nome_regime
 * @property string $observacao
 *
 * @property Servidor[] $servidors
 */
class Regime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_regime', 'observacao'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idregime' => Yii::t('app', 'Idregime'),
            'nome_regime' => Yii::t('app', 'Nome Regime'),
            'observacao' => Yii::t('app', 'Observacao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['regime_idregime' => 'idregime']);
    }
}
