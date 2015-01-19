<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller {

    /**
     * @return array
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex() {

        return $this->render( 'index' );
    }

}