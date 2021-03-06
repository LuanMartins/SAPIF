<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instituicao;

/**
 * InstituicaoSearch represents the model behind the search form about `app\models\Instituicao`.
 */
class InstituicaoSearch extends Instituicao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idinstituicao', 'estado_idestado'], 'integer'],
            [['nome', 'sigla'], 'safe'],
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
        $query = Instituicao::find();

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
            'idinstituicao' => $this->idinstituicao,
            'estado_idestado' => $this->estado_idestado,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sigla', $this->sigla]);

        return $dataProvider;
    }
}
