<?php

defined( 'YII_ENV' ) or define( 'YII_ENV', $_SERVER['SERVER_ADDR'] == '127.0.0.1' ? 'dev' : 'prod' );
defined( 'YII_DEBUG' ) or define( 'YII_DEBUG', YII_ENV == 'dev' ? true : false );
defined( 'YII_TRACE_LEVEL' ) or define( 'YII_TRACE_LEVEL', 3 );

$appPath = dirname(__DIR__). '/app';

require $appPath . '/vendor/autoload.php';
require $appPath . '/vendor/yiisoft/yii2/Yii.php';

( new yii\web\Application( require $appPath . '/config/web.php' ) )->run();