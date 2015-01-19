<?php

use yii\grid\GridView;
use app\models\post\Search;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\post\Search $searchModel
 */

$this->title                   = Yii::t( 'app', 'Posts' );
$this->params['breadcrumbs'][] = $this->title;

$this->params['titleButton'][] = [
    'label' => Yii::t( 'app', 'Add post' ),
    'link'  => [ '/post/create' ],
    'type'  => 'success',
    'icon'  => 'plus'
];

$this->params['titleButton'][] = [
    'label' => Yii::t( 'app', 'Sync with social networks' ),
    'link'  => [ '/sync/index' ],
    'type'  => 'success',
    'icon'  => 'refresh'
];

$this->params['titleButton'][] = [
    'label' => Yii::t( 'app', 'Remove all records' ),
    'link'  => [ '/post/clear' ],
    'type'  => 'danger',
    'icon'  => 'remove'
];

?>
<div class="post-index">

    <?=
    GridView::widget( [
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'layout'       => '{items}{pager}',
        'rowOptions'   => function ( $model, $key, $index, $grid ) {

        },
        'columns'      => [
            'id_post',
            'content',
            [
                'value' => function ( $model ) {
                    return implode( ", ", array_map( function ( $model ) {
                        return $model->service_name;
                    }, $model->getSyncModel()->all() ) );
                }
            ],
            [
                'attribute' => 'published_at',
                'value'     => function ( $model ) {
                    if ( ! empty( $model->published_at ) ) {
                        return date( "d-m-Y h:i", $model->published_at );
                    }
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ] ); ?>
</div>