<?php

use yii\bootstrap\Alert;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

BootstrapAsset::register( $this );

$counterPath = '@app/views/layouts/counter.php';
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="<?= Yii::$app->urlManager->getBaseUrl(); ?>/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title><?= Html::encode( $this->title ) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        NavBar::begin( [
            'brandLabel' => Yii::$app->id,
            'brandUrl'   => Yii::$app->homeUrl,
            'options'    => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ] );

        echo Nav::widget( [
            'options' => [ 'class' => 'navbar-nav navbar-left' ],
            'items'   => [
                [
                    'label' => Yii::t( 'app', 'Getting started' ),
                    'url'   => [ '/site/index' ]
                ],
                [
                    'label' => Yii::t( 'app', 'Social networks' ),
                    'url'   => [ '/sync/index' ]
                ],
                [
                    'label' => Yii::t( 'app', 'Work with Posts' ),
                    'url'   => [ '/post/index' ]
                ]
            ],
        ] );

        NavBar::end();
        ?>

        <div class="container" style="margin-top: 80px;">
            <?php if ( ! empty( $this->title ) ): ?>
                <h1>
                    <?php echo $this->title; ?>
                    <?php if ( isset( $this->params['titleButton'] ) ): ?>
                        <?php if ( isset( $this->params['titleButton'] ) ): ?>
                            <div class="btn-group form-group" role="titleButton">
                                <?php foreach ( $this->params['titleButton'] as $action ): ?>
                                    <a href="<?= ( isset( $action['link'] ) ? Url::to( $action['link'] ) : '#' ); ?>"
                                       class="btn btn-<?= ( isset( $action['type'] ) ? $action['type'] : 'default' ); ?>">
                                        <?php if ( isset( $action['icon'] ) ): ?>
                                            <?= Html::tag( 'i', '', [ 'class' => 'glyphicon glyphicon-' . $action['icon'] ] ) ?>
                                        <?php endif; ?>
                                        <?= $action['label'] ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>


            <?php echo Breadcrumbs::widget( [
                'links' => isset( $this->params['breadcrumbs'] ) ? $this->params['breadcrumbs'] : null
            ] ) ?>


            <?php if ( isset( $this->params['actions'] ) ): ?>
                <div class="btn-group form-group" role="actions">
                    <?php foreach ( $this->params['actions'] as $action ): ?>
                        <a href="<?= ( isset( $action['link'] ) ? Url::to( $action['link'] ) : '#' ); ?>"
                           class="btn btn-<?= ( isset( $action['type'] ) ? $action['type'] : 'default' ); ?>">
                            <?php if ( isset( $action['icon'] ) ): ?>
                                <?= Html::tag( 'i', '', [ 'class' => 'glyphicon glyphicon-' . $action['icon'] ] ) ?>
                            <?php endif; ?>
                            <?= $action['label'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php
            $keys = [
                'yii2-SyncSocial' => 'danger',
                'warning'         => 'warning',
                'info'            => 'info',
                'success'         => 'success'
            ];
            foreach ( $keys as $key => $class ) {
                if ( Yii::$app->session->hasFlash( $key ) ) {
                    echo Alert::widget( [
                        'options' => [
                            'class' => 'alert-' . $class,
                        ],
                        'body'    => Yii::$app->session->getFlash( $key )
                    ] );
                }
            }
            ?>

            <?php echo $content ?>
        </div>
    </div>

    <footer class="footer">

        <div class="container">
            <hr>
            <p class="pull-left"><a href="http://ufocoder.com">&copy; ufocoder.com</a>, <?= date( 'Y' ) ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    <?php if (file_exists(Yii::getAlias($counterPath))): ?>
        <?= $this->renderFile($counterPath)?>
    <?php endif; ?>
    </body>
    </html>
<?php $this->endPage() ?>