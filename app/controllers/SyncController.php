<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class SyncController
 * @package app\controllers
 */
class SyncController extends Controller {

    /**
     * @return array
     */
    public function actions() {

        return [
            'connect'    => [
                'class' => 'ufocoder\SyncSocial\actions\ConnectAction'
            ],
            'disconnect' => [
                'class' => 'ufocoder\SyncSocial\actions\DisconnectAction'
            ],
            'sync'       => [
                'class' => 'ufocoder\SyncSocial\actions\SyncAction'
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex() {

        if (! Yii::$app->synchronizer->getService('vkontakte')->isConnected()) {
            Yii::$app->session->setFlash( 'info', Yii::t( 'app', 'After connect with VKontakte enter code in URL: {link}', [
                'link' => Yii::$app->urlManager->createAbsoluteUrl( [
                        'sync/connect',
                        'service' => 'vkontakte',
                        'code'    => 'VKONTAKTE_CODE'
                    ] )
            ] ) );
        }

        return $this->render( '@ufocoder/SyncSocial/views/sync/index' );
    }

}