<?php

namespace app\models\post;

use Yii;
use yii\db\ActiveQuery;

class Query extends ActiveQuery {
    /**
     * @param int $limit
     *
     * @return $this
     */
    public function latest( $limit = 20 ) {
        $this->orderBy( 'published_at' );
        $this->limit( $limit );

        return $this;
    }
}