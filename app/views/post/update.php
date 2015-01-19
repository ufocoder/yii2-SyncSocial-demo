<?php

/**
 * @var yii\web\View $this
 * @var app\models\Sign $model
 */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sign-create">
    <h1><i class="fa fa-plus"></i> <?= Yii::t('app', 'Update post'); ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>