<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campus".
 *
 * @property integer $idcampus
 * @property string $nome_campus
 * @property integer $instituicao_idinstituicao1
 * @property integer $turno_idturno
 * @property integer $cidade_idcidade
 *
 * @property Cidade $cidadeIdcidade
 * @property Instituicao $instituicaoIdinstituicao1
 * @property Turno $turnoIdturno
 * @property Interesse[] $interesses
 * @property Servidor[] $servidorIdservidores
 * @property Servidor[] $servidors
 */
class Campus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_campus', 'instituicao_idinstituicao1', 'turno_idturno', 'cidade_idcidade'], 'required'],
            [['instituicao_idinstituicao1', 'turno_idturno', 'cidade_idcidade'], 'integer'],
            [['nome_campus'], 'string', 'max' => 150],
            [['cidade_idcidade'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['cidade_idcidade' => 'idcidade']],
            [['instituicao_idinstituicao1'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['instituicao_idinstituicao1' => 'idinstituicao']],
            [['turno_idturno'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_idturno' => 'idturno']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcampus' => Yii::t('app', 'Idcampus'),
            'nome_campus' => Yii::t('app', 'Nome Campus'),
            'instituicao_idinstituicao1' => Yii::t('app', 'Instituicão'),
            'turno_idturno' => Yii::t('app', 'Turno'),
            'cidade_idcidade' => Yii::t('app', 'Cidade'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidadeIdcidade()
    {
        return $this->hasOne(Cidade::className(), ['idcidade' => 'cidade_idcidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicaoIdinstituicao1()
    {
        return $this->hasOne(Instituicao::className(), ['idinstituicao' => 'instituicao_idinstituicao1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnoIdturno()
    {
        return $this->hasOne(Turno::className(), ['idturno' => 'turno_idturno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInteresses()
    {
        return $this->hasMany(Interesse::className(), ['campus_idcampus' => 'idcampus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidorIdservidores()
    {
        return $this->hasMany(Servidor::className(), ['idservidores' => 'servidor_idservidores'])->viaTable('interesse', ['campus_idcampus' => 'idcampus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServidors()
    {
        return $this->hasMany(Servidor::className(), ['campus_idcampus' => 'idcampus']);
    }
}
