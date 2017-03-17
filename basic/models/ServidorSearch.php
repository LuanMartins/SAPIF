<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servidor;

/**
 * ServidorSearch represents the model behind the search form about `app\models\Servidor`.
 */
class ServidorSearch extends Servidor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idservidores', 'tempo_trabalho', 'qtd_permutas', 'regime_idregime', 'titulacao_idtitulacao', 'instituicao_idinstituicao', 'campus_idcampus', 'area_idarea', 'user_id'], 'integer'],
            [['nome', 'telefone', 'foto'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Servidor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idservidores' => $this->idservidores,
            'tempo_trabalho' => $this->tempo_trabalho,
            'qtd_permutas' => $this->qtd_permutas,
            'regime_idregime' => $this->regime_idregime,
            'titulacao_idtitulacao' => $this->titulacao_idtitulacao,
            'instituicao_idinstituicao' => $this->instituicao_idinstituicao,
            'campus_idcampus' => $this->campus_idcampus,
            'area_idarea' => $this->area_idarea,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
