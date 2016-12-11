<?php

use yii\db\Migration;
use common\models\Task;

class m161209_232159_added_item extends Migration
{
    public function up()
    {
        $this->createTable(
            Task::tableName(),
            [
                'id'        => $this->primaryKey(),
                'uid'     => $this->integer()->notNull(),
                'description'  => $this->string()->notNull(),
                'itemGroup'   => $this->integer()->defaultValue(0),
                'dueDate' => $this->date(),
                'state' => $this->integer()->defaultValue(false),
            ]
        );
    }

    public function down()
    {
        $this->dropTable(Task::tableName());
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
