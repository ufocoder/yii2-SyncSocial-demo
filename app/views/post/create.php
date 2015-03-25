<?php

/**
 * @var yii\web\View $this
 * @var app\models\post\Post $model
 */

$this->title = Yii::t('app', 'Add post');

$this->params['titleButton'][] = [
    'label' => Yii::t( 'app', 'Back to posts' ),
    'link'  => [ '/post/index' ],
    'type'  => 'success',
    'icon'  => 'list'
];

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
