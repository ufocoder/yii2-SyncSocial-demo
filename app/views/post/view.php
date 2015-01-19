<?php

use yii\helpers\Html;

$urlNormal = Yii::$app->urlManager->createUrl(['site/view', 'id' => $model->id_post]);
$urlShare = urlencode(Yii::$app->urlManager->createAbsoluteUrl(['site/view', 'id' => $model->id_sign]));

?>
<div class="sign">
    <div class="sign-meta">
        <div class="meta-id">
            <a class="button" href="<?=$urlNormal;?>">#<?php echo $model->id_sign; ?></a>
        </div>
        <div class="meta-date">
            <i class="fa fa-calendar"></i>
            <?php if (!empty($model->published_at)):?>
                <?=date('d-m-Y H:i', $model->published_at); ?>
            <?php else: ?>
                <?=date('d-m-Y H:i', $model->created_at); ?>
            <?php endif; ?>
        </div>
        <div class="meta-rating">
            <div class="button like">
                <i class="fa fa-thumbs-o-up"></i>
            </div>
            <div class="button count">
                <?php echo $model->rating; ?>
            </div>
            <div class="button dislike">
                <i class="fa fa-thumbs-o-down"></i>
            </div>
        </div>
        <div class="meta-share">
            <div class="button">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlShare; ?>"><i class="fa fa-facebook"></i></a>
            </div>
            <div class="button">
                <a href="https://vk.com/share.php?url=<?php echo $urlShare; ?>"><i class="fa fa-vk"></i></a>
            </div>
            <div class="button">
                <a href="https://plus.google.com/share?url=<?php echo $urlShare; ?>"><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="button">
                <a href="https://plus.google.com/share?url=<?php echo $urlShare; ?>"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="sign-content">
        <?php echo Html::encode($model->content); ?>
    </div>
</div>