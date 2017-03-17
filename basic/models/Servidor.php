<?php

namespace app\models;

use Yii;
use amnah\yii2\user\models\User;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "servidor".
 *
 * @property integer $idservidores
 * @property string $nome
 * @property integer $tempo_trabalho
 * @property string $telefone
 * @property integer $qtd_permutas
 * @property integer $regime_idregime
 * @property integer $titulacao_idtitulacao
 * @property integer $instituicao_idinstituicao
 * @property integer $campus_idcampus
 * @property integer $area_idarea
 * @property string $foto
 * @property integer $user_id
 * @property integer $dou_iddou
 *
 * @property Interesse[] $interesses
 * @property Campus[] $campusIdcampuses
 * @property Area $areaIdarea
 * @property Campus $campusIdcampus
 * @property Instituicao $instituicaoIdinstituicao
 * @property Regime $regimeIdregime
 * @property Titulacao $titulacaoIdtitulacao
 * @property User $user
 * @property Dou $douIddou
 * @property  string $opniao_cidade
 * @property string $opniao_campus
 */
class Servidor extends \yii\db\ActiveRecord
{
    public $upload;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servidor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tempo_trabalho', 'telefone', 'regime_idregime', 'titulacao_idtitulacao', 'instituicao_idinstituicao', 'campus_idcampus', 'area_idarea', 'user_id','opniao_campus','opniao_cidade'], 'required'],
            [['tempo_trabalho', 'qtd_permutas', 'regime_idregime', 'titulacao_idtitulacao', 'instituicao_idinstituicao', 'campus_idcampus', 'area_idarea', 'user_id'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['telefone'], 'string', 'max' => 14],
            [['foto'], 'string', 'max' => 250],
            [['area_idarea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_idarea' => 'idarea']],
            [['campus_idcampus'], 'exist', 'skipOnError' => true, 'targetClass' => Campus::className(), 'targetAttribute' => ['campus_idcampus' => 'idcampus']],
            [['instituicao_idinstituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['instituicao_idinstituicao' => 'idinstituicao']],
            [['dou_iddou'], 'exist', 'skipOnError' => true, 'targetClass' => Dou::className(), 'targetAttribute' => ['dou_iddou' => 'iddou']],
            [['regime_idregime'], 'exist', 'skipOnError' => true, 'targetClass' => Regime::className(), 'targetAttribute' => ['regime_idregime' => 'idregime']],
            [['titulacao_idtitulacao'], 'exist', 'skipOnError' => true, 'targetClass' => Titulacao::className(), 'targetAttribute' => ['titulacao_idtitulacao' => 'idtitulacao']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idservidores' => Yii::t('app', 'Idservidores'),
            'nome' => Yii::t('app', 'Nome'),
            'tempo_trabalho' => Yii::t('app', 'Tempo de Trabalho'),
            'telefone' => Yii::t('app', 'Numero do Telefone'),
            'qtd_permutas' => Yii::t('app', 'Quantidade de  Permutas'),
            'regime_idregime' => Yii::t('app', 'Regime'),
            'titulacao_idtitulacao' => Yii::t('app', 'Titulacao'),
            'instituicao_idinstituicao' => Yii::t('app', 'Instituicao '),
            'campus_idcampus' => Yii::t('app', 'Campus '),
            'area_idarea' => Yii::t('app', 'Area '),
            'upload' => Yii::t('app', 'Foto'),
            'user_id' => Yii::t('app', 'User ID'),
            'opniao_cidade'=> yii::t('app', 'Opnião da Cidade'),
            'opniao_campus'=> yii::t('app', 'Opnião do Campus'),
            //'dou_iddou' => Yii::t('app', 'DOU - Diário Oficial da União'),
        ];
    }

    protected function saveImage(){
        if (!is_null($this->upload)) {
            // $marcadagua = yii::getAlias(yii::$app->params['localImageFolder'].'logo_ifrn.png');

            image::thumbnail($this->upload->tempName,900,300)->save($this->getLocalImageFilename(1));

            //image::thumbnail($this->upload->tempName,90,90)->save($this->getLocalImageFilename(2));

            //image::watermark($this->upload->tempName,$marcadagua)->save($this->getLocalImageFilename(3));
        }
    }

    public function beforeSave($insert){
        $sub_string = ' ';
        $this->upload = UploadedFile::getInstance($this, 'upload');
        $this->foto = $this->upload->baseName.".".$this->upload->extension;
        //$this->foto = str_replace($sub_string,'_' , $this->imagem);
        return parent::beforeSave($insert);

    }
    public function afterSave($insert,$changedAttributes){

        $this->saveImage();
    }

    public function afterDelete(){


        $img = $this->getLocalImageFilename();
        if (file_exists($img)) @unlink($img);




    }


    public function load($data){
        $r = parent::load($data);
        $this->upload = UploadedFile::getInstance($this, 'upload');
        return $r;

    }

    public function getLocalImageFilename(){

        return yii::getAlias(yii::$app->params['localImageFolder']).
        'imagens/'.$this->foto;
    }

    public function getWebImageFilename(){

        return yii::getAlias(yii::$app->params['webImageFolder']).
        'imagens/'.$this->foto;
    }

    public function getHtmlImage(){

        return $this->getWebImageFilename();
    }

    public function getHtmlImageRoute(){

        return $this->getWebImageFilename();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInteresses()
    {
        return $this->hasMany(Interesse::className(), ['servidor_idservidores' => 'idservidores']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampusIdcampuses()
    {
        return $this->hasMany(Campus::className(), ['idcampus' => 'campus_idcampus'])->viaTable('interesse', ['servidor_idservidores' => 'idservidores']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaIdarea()
    {
        return $this->hasOne(Area::className(), ['idarea' => 'area_idarea']);
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
    public function getInstituicaoIdinstituicao()
    {
        return $this->hasOne(Instituicao::className(), ['idinstituicao' => 'instituicao_idinstituicao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegimeIdregime()
    {
        return $this->hasOne(Regime::className(), ['idregime' => 'regime_idregime']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulacaoIdtitulacao()
    {
        return $this->hasOne(Titulacao::className(), ['idtitulacao' => 'titulacao_idtitulacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDouIddou()
    {
        return $this->hasOne(Dou::className(), ['iddou' => 'dou_iddou']);
    }
}












