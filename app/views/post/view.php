<?php

/**
 * @var yii\web\View $this
 * @var app\models\post\Post $model
 */

use \yii\helpers\Html;

$this->title = Yii::t( 'app', 'Post #{id}', [ 'id' => $model->id_post ] );

$this->params['titleButton'][] = [
    'label' => Yii::t( 'app', 'Back to posts' ),
    'link'  => [ '/post/index' ],
    'type'  => 'success',
    'icon'  => 'list'
];

$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Posts' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = Yii::t( 'app', 'Post #{id}', [ 'id' => $model->id_post ] );


?>

<div class="row">
    <div class="col-md-2">
        <strong><?= Yii::t( 'app', 'Date created' ) ?></strong>
    </div>
    <div class="col-md-10">
        <?= date( 'd-m-Y H:i', $model->created_at ); ?>
    </div>
</div>


<div class="row">
    <div class="col-md-2">
        <strong><?= Yii::t( 'app', 'Posted to' ) ?></strong>
    </div>
    <div class="col-md-10">
        <?php if ( empty( $model->syncModel ) ): ?>
            <i><?= Yii::t( 'app', 'There\'re not social networks posts' ); ?></i>
        <?php else: ?>
            <?php foreach($model->syncModel as $sync):?>
                <?= Html::encode( $sync->service_name ); ?>, URL:
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <strong><?= Yii::t( 'app', 'Content' ) ?></strong>
    </div>
    <div class="col-md-10">
        <?= Html::encode( $model->content ); ?>
    </div>
</div>