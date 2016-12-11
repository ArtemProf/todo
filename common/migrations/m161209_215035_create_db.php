<?php

use yii\db\Migration;
use common\models\user\User;

class m161209_215035_create_db extends Migration
{
    public function up()
    {
        $this->createTable(
            User::tableName(),
            [
                'id'        => $this->primaryKey(),
                'email'     => $this->string()->notNull(),
                'password'  => $this->string()->notNull(),
                'authKey'   => $this->string(),
                'authToken' => $this->string(),
                'nameFirst' => $this->string(),
                'nameLast'  => $this->string(),
                'admin'     => $this->boolean()->defaultValue(false)
            ]
        );
    }

    public function down()
    {
        $this->dropTable(User::tableName());
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
