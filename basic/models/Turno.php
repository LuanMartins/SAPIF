<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property integer $idturno
 * @property string $turno
 *
 * @property Campus[] $campuses
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['turno'], 'required'],
            [['turno'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idturno' => Yii::t('app', 'Idturno'),
            'turno' => Yii::t('app', 'Turno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampuses()
    {
        return $this->hasMany(Campus::className(), ['turno_idturno' => 'idturno']);
    }
}
