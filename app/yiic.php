<?php

defined( 'YII_ENV' ) or define( 'YII_ENV', 'dev' );
defined( 'YII_DEBUG' ) or define( 'YII_DEBUG', true );
defined( 'YII_TRACE_LEVEL' ) or define( 'YII_TRACE_LEVEL', 3 );

defined( 'STDIN' ) or define( 'STDIN', fopen( 'php://stdin', 'r' ) );
defined( 'STDOUT' ) or define( 'STDOUT', fopen( 'php://stdout', 'w' ) );

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

$application = new yii\console\Application( require __DIR__ . '/config/console.php' );
$exitCode    = $application->run();
exit( $exitCode );