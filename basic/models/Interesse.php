<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interesse".
 *
 * @property integer $servidor_idservidores
 * @property integer $campus_idcampus
 *
 * @property Campus $campusIdcampus
 * @property Servidor $servidorIdservidores
 */
class Interesse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interesse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servidor_idservidores', 'campus_idcampus'], 'required'],
            [['servidor_idservidores', 'campus_idcampus'], 'integer'],
            [['campus_idcampus'], 'exist', 'skipOnError' => true, 'targetClass' => Campus::className(), 'targetAttribute' => ['campus_idcampus' => 'idcampus']],
            [['servidor_idservidores'], 'exist', 'skipOnError' => true, 'targetClass' => Servidor::className(), 'targetAttribute' => ['servidor_idservidores' => 'idservidores']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'servidor_idservidores' => Yii::t('app', 'Servidor Idservidores'),
            'campus_idcampus' => Yii::t('app', 'Campus'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampusIdcampus()
    {
        return $this->hasOne(Campus::className(), ['idcampus' => 'campus_idcampus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidorIdservidores()
    {
        return $this->hasOne(Servidor::className(), ['idservidores' => 'servidor_idservidores']);
    }
}
