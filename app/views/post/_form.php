<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\post\Post $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="form">
    <?php $form = ActiveForm::begin( [
        'action'                 => $model->isNewRecord ? Url::toRoute( 'post/create' ) : Url::toRoute( [
                'post/update',
                'id' => $model->getPrimaryKey()
            ] ),
        'enableClientValidation' => false,
        'options'                => [
            'class' => 'form',
            'role'  => 'form'
        ]
    ] ); ?>

    <div class="form-group row">
        <?= Html::activeLabel( $model, 'content', [ 'class' => 'col-sm-2 control-label' ] ); ?>
        <div class="col-sm-10">
            <?= Html::activeTextarea( $model, 'content', [ 'class' => 'form-control' ] ); ?>
            <?= $model->hasErrors( 'content' )
                ? Html::error( $model, 'content', [ 'class' => 'form-error' ] )
                : null;
            ?>
        </div>
    </div>

    <div class="form-group row">

        <?php
            $services = Yii::$app->synchronizer->getServiceList();
            $items = [ ];
            foreach ( $services as $service ) {
                if ( ! Yii::$app->synchronizer->getService( $service )->isReadOnly() ) {
                    $items[ $service ] = $service;
                }
            }
        ?>

        <?= Html::activeLabel( $model, 'syncServices', [ 'class' => 'col-sm-2 control-label' ] ); ?>

        <div class="col-sm-10">
            <?= Html::activeCheckboxList( $model, 'syncServices', $items, [
                'separator' => '<br>',
                'item' => function($index, $label, $name, $checked, $value){
                    $service = Yii::$app->synchronizer->getService( $label );
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'label' => Html::encode( $service->getName() ),
                        'labelOptions' => [
                            'class' => $service->isConnected()
                                        ? 'bg-success'
                                        : 'bg-danger'
                        ]
                    ]);

                }
            ]); ?>
            <?= $model->hasErrors( 'syncServices' )
                ? Html::error( $model, 'syncServices', [ 'class' => 'form-error' ] )
                : null;
            ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="form-submit">
                <?= Html::submitButton( Yii::t( 'app', 'Submit' ), [ 'class' => 'btn btn-success' ] ) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
