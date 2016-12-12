<?php

use yii\db\Migration;
use common\models\user\User;

class m161211_233200_add_admin extends Migration
{
    public function up()
    {
        $this->insert(
            User::tableName(),
            [
                'id'        => 1,
                'email'     => 'admin@admin.ru',
                'password'  => '$2y$13$5fXid1ulpsavaLZJwh4s0OOBIase2yqMcPnqPrPbkfBn1Emh/udIK', //=root123
                'authKey'   => NULL,
                'authToken' => NULL,
                'nameFirst' => 'Admin',
                'nameLast'  => NULL,
                'admin'     => 1
            ]);
    }

    public function down()
    {

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
