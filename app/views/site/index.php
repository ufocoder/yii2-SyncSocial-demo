<?php

$user = 'ufocoder';
$repo = 'yii2-SyncSocial';

?>

<div class="text-center">
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6">

            <h1>
                <small><span class="glyphicon glyphicon-refresh"></span></small>
                <?= Yii::t( 'app', 'Yii2 SyncSocial Extension' ); ?>
            </h1>

            <h5>
                <?= Yii::t( 'app', 'There\'s an example application of extension usage for Active Record model' ); ?>
            </h5>

            <div class="btn-group">
                <a href="<?= Yii::$app->urlManager->createUrl( 'sync/index' ); ?>" class="btn btn-success"><i
                        class="glyphicon glyphicon-plus"></i> <?= Yii::t( 'app', 'Connect to social network' ); ?></a>
                </a>
                <a href="<?= Yii::$app->urlManager->createUrl( 'post/index' ); ?>" class="btn btn-success"><i
                        class="glyphicon glyphicon-list"></i> <?= Yii::t( 'app', 'Work with posts' ); ?></a>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xs-offset-3 col-xs-6">
        <hr>
    </div>

    <div class="col-xs-offset-3 col-xs-3 text-right">

        <a href="https://github.com/ufocoder/yii2-SyncSocial">
            <img src="<?= Yii::getAlias( '@web' ); ?>/images/github.png">
        </a>
    </div>

    <div class="col-xs-3">
        <iframe
            src="https://ghbtns.com/github-btn.html?user=<?= $user; ?>&repo=<?= $repo; ?>&type=star&count=true"
            frameborder="0" style="text-align: right" scrolling="0" width="100%" height="20px"></iframe>
        <iframe
            src="https://ghbtns.com/github-btn.html?user=<?= $user; ?>&repo=<?= $repo; ?>&type=watch&count=true&v=2"
            frameborder="0" scrolling="0" width="100%" height="20px"></iframe>

        <iframe src="https://ghbtns.com/github-btn.html?user=<?= $user; ?>&repo=<?= $repo; ?>&type=fork&count=true"
                frameborder="0"
                scrolling="0" width="170px" height="20px"></iframe>
    </div>


    <div class="col-xs-offset-3 col-xs-6" style="margin-top: 20px">
        <div class="alert" style="background: #f8f8f8; border: 1px #eee solid">
            <h4><?= Yii::t('app', 'Attention'); ?></h4>
            <ol>
                <li><?= Yii::t('app', 'All operation with your social account can executed by you only!') ;?></li>
                <li><?= Yii::t('app', 'Noone can\'t collect messages from your social network account or post message to your social network account!') ;?></li>
                <li><?= Yii::t('app', 'There\'s Yii2-SyncSocial Extension is configurated with <nobr><code>syncDelete</code> = <code>false</code></nobr>') ;?><br />
                    <small>(<?= Yii::t('app', 'that means that after you delete post in application, post from social network will not be deleted') ;?>)</small>
                </li>
            </ol>
        </div>
    </div>

</div>


<div class="row" style="margin-bottom: 60px">
    <div class="col-xs-offset-3 col-xs-6" style="text-align:center">
        <form action="https://merchant.wmtransfer.com/lmi/payment.asp" method="POST">
            <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="5.00">
            <input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="WWlpMi1TeW5jU29jaWFs">
            <input type="hidden" name="LMI_PAYEE_PURSE" value="Z150088833197">
            <button type="submit" class="btn btn-primary">Donate 5 WMZ :)</button>
        </form>
    </div>
</div>