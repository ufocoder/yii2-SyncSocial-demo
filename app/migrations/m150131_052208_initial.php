<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150131_052208_initial
 */
class m150131_052208_initial extends Migration {

    /**
     * @return bool
     */
    public function up() {

        $this->createTable( '{{%post}}', [
            'id_post'      => Schema::TYPE_PK,
            'content'      => Schema::TYPE_TEXT . ' NOT NULL',
            'created_at'   => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'updated_at'   => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'published_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL'
        ] );

        return true;
    }

    /**
     * @return bool
     */
    public function down() {

        $this->dropTable( '{{%post}}' );

        return true;
    }

}
