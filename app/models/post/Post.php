<?php

namespace app\models\post;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use ufocoder\SyncSocial\behaviors\SynchronizerBehavior;
use ufocoder\SyncSocial\components\SyncServicesValidator;


/**
 * This is the model class for table "Post".
 *
 * @property integer $id_post
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $published_at
 */
class Post extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            SynchronizerBehavior::className(),
            TimestampBehavior::className()
        ];
    }


    /**
     * @inheritdoc
     * @return Query
     */
    public static function find() {
        return new Query( get_called_class() );
    }

    /**
     * @return array
     */
    public function scenarios() {
        return [
            'default' => [ 'content', 'syncServices' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [ [ 'content', 'email', 'notification', 'published_ad' ], 'required' ],
            [ [ 'notification' ], 'boolean' ],
            [ [ 'content' ], 'string' ],
            [ [ 'syncServices'], SyncServicesValidator::className() ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSyncModel() {
        return $this->hasMany( 'ufocoder\SyncSocial\models\SyncModel', [ 'model_id' => 'id_post' ] );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_post'      => Yii::t( 'app', 'Post' ),
            'content'      => Yii::t( 'app', 'Content' ),
            'created_at'   => Yii::t( 'app', 'Time Created' ),
            'updated_at'   => Yii::t( 'app', 'Time Updated' ),
            'published_at' => Yii::t( 'app', 'Time Published' ),
            'status'       => Yii::t( 'app', 'Status' )
        ];
    }

}