<?php

use yii\helpers\Json;

$dbConfig   = __DIR__ . '/db.php';
$syncConfig = dirname( dirname( __DIR__ ) ) . '/syncsocial.json';

return [
    'id'         => 'Yii2 SyncSocial Application',
    'basePath'   => dirname( __DIR__ ),
    'aliases'    => array(
        '@bower'  => dirname( dirname( __DIR__ ) ) . '/bower_components',
        '@vendor' => dirname( __DIR__ ) . '/vendor'
    ),
    'extensions' => require( dirname( __DIR__ ) . '/vendor/yiisoft/extensions.php' ),
    'components' => [
        'db'           => file( $dbConfig ) ? require( $dbConfig ) : [ ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n'         => [
            'translations' => [
                'app'        => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => "@app/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap'        => [
                        'app' => 'app.php'
                    ]
                ],
                'error'      => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => "@app/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap'        => [
                        'error' => 'error.php'
                    ]
                ],
                'SyncSocial' => array(
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@ufocoder/SyncSocial/messages',
                ),
            ]
        ],
        'synchronizer' => [
            'class'           => 'ufocoder\SyncSocial\components\Synchronizer',
            'modelClass'      => 'app\models\post\Post',
            'settings'        => file_exists( $syncConfig ) ? Json::decode( file_get_contents( $syncConfig ) ) : [ ],
            'absolutePostUrl' => function ( $service, $id_post ) {
                return Yii::$app->urlManager->createAbsoluteUrl( [
                    'default/post/view',
                    'id' => $id_post
                ] );
            },
            'connectUrl'      => function ( $service ) {
                return Yii::$app->urlManager->createAbsoluteUrl( [ 'sync/connect', 'service' => $service ] );
            },
            'disconnectUrl'   => function ( $service ) {
                return Yii::$app->urlManager->createAbsoluteUrl( [ 'sync/disconnect', 'service' => $service ] );
            },
            'syncUrl'         => function ( $service ) {
                return Yii::$app->urlManager->createAbsoluteUrl( [ 'sync/sync', 'service' => $service ] );
            }
        ],
        'request'      => [
            'enableCookieValidation' => true,
            'enableCsrfValidation'   => true,
            'cookieValidationKey'    => md5( 'cookiesalt' ),
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ],
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '/'                             => 'site/index'
            ]
        ]
    ]
];