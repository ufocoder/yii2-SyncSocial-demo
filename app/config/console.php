<?php

$dbConfig   = __DIR__ . '/db.php';

return [

    'id'                  => 'Web Application',
    'basePath'            => dirname( __DIR__ ),
    'aliases'             => array(
        '@bower'  => dirname( dirname( __DIR__ ) ) . '/bower_components',
        '@vendor' => dirname( __DIR__ ) . '/vendor'
    ),
    'extensions'          => require( dirname( __DIR__ ) . '/vendor/yiisoft/extensions.php' ),
    'controllerNamespace' => 'app\commands',
    'components'          => [
        'db'           => file( $dbConfig ) ? require( $dbConfig ) : [ ],
        'log' => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ]
    ]
];