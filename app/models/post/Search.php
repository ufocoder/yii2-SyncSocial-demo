<?php

namespace app\models\post;

use Yii;
use yii\data\ActiveDataProvider;

use app\models\post\Post;

/**
 * Search represents the model behind the search form about `app\models\Post`.
 */
class Search extends Post {
    /**
     * @var string
     */
    private static $queryParam = 'filter';

    /**
     * @return string
     */
    public static function getQueryParam() {
        return self::$queryParam;
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [
                [
                    'id_post',
                    'id_author',
                    'created_at',
                    'updated_at',
                    'published_at',
                    'status'
                ],
                'integer'
            ],
            [ [ 'content', ], 'safe' ],
        ];
    }

    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search( $params ) {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider( [
            'query' => $query,
        ] );

        $query->OrderBy( [
            'created_at' => SORT_DESC
        ] );

        if ( ! ( $this->load( $params ) && $this->validate() ) ) {
            return $dataProvider;
        }

        $query->andFilterWhere( [
            'id_author'    => $this->id_author,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            'published_at' => $this->published_at
        ] );


        $query->andFilterWhere( [ 'like', 'content', $this->content ] );

        return $dataProvider;
    }
}
