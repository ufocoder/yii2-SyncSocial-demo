<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\post\Search;
use app\models\post\Post;
use yii\web\NotFoundHttpException;

/**
 * Class PostController
 * @package app\controllers
 */
class PostController extends Controller {

    /**
     * @return string
     */
    public function actionIndex() {

        $searchModel  = new Search;
        $dataProvider = $searchModel->search( Yii::$app->request->getQueryParams() );

        return $this->render( 'index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ] );
    }


    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate() {

        $model = new Post;

        if ( $model->load( Yii::$app->request->post() ) ) {
            $model->save();

            return $this->redirect( [ 'index' ] );
        } else {
            return $this->render( 'create', [
                'model' => $model,
            ] );
        }
    }

    /**
     * @param $id
     *
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate( $id ) {

        $model = Post::findOne( $id );

        if ( $model === null ) {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }

        if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
            return $this->redirect( [ 'index' ] );
        } else {
            return $this->render( 'update', [
                'model' => $model,
            ] );
        }
    }

    /**
     * @param $id
     *
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete( $id ) {

        if ( ( $model = Post::findOne( $id ) ) !== null ) {
            $model->delete();


            return $this->redirect( [ 'index' ] );
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }

    /**
     * @return \yii\web\Response
     */
    public function actionClear() {

        $count = 0;
        $posts = Post::find()->all();

        foreach ( $posts as $post ) {
            if ( $post->delete() ) {
                $count ++;
            }
        }

        if ( $count > 0 ) {
            Yii::$app->session->setFlash( 'success', Yii::t( 'app', 'Record are deleted successfully!' ) );
        } else {
            Yii::$app->session->setFlash( 'info', Yii::t( 'app', 'Records are deleted already.' ) );
        }

        return $this->redirect( [ 'index' ] );
    }
}