<?php

use yii\db\Migration;

/**
 * Handles the creation for table `session`.
 */
class m160829_220801_create_session_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('session', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'data' => 'json',
        ]);
        $this->addForeignKey('fk_session_user_id', '{{%session}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('session');
    }
}
