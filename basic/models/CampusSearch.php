<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Campus;

/**
 * CampusSearch represents the model behind the search form about `app\models\Campus`.
 */
class CampusSearch extends Campus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcampus', 'instituicao_idinstituicao1', 'turno_idturno'], 'integer'],
            [['nome_campus'], 'safe'],
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
        $query = Campus::find();

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
            'idcampus' => $this->idcampus,
            'instituicao_idinstituicao1' => $this->instituicao_idinstituicao1,
            'turno_idturno' => $this->turno_idturno,
        ]);

        $query->andFilterWhere(['like', 'nome_campus', $this->nome_campus]);

        return $dataProvider;
    }
}
