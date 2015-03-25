<?php

/**
 * @var yii\web\View $this
 * @var app\models\post\Post $model
 */

$this->params['breadcrumbs'][] = [ 'label' => Yii::t( 'app', 'Posts' ), 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t( 'app', 'Post #{id}', [ 'id' => $model->id_post ] ),
    'url'   => [ 'view', 'id' => $model->id_post ]
];
$this->params['breadcrumbs'][] = Yii::t( 'app', 'Update' );
?>

<div class="sign-create">
    <h1><i class="fa fa-plus"></i> <?= Yii::t( 'app', 'Update post' ); ?></h1>

    <?= $this->render( '_form', [
        'model' => $model,
    ] ) ?>
</div>