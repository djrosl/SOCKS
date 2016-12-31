<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notification`.
 */
class m161231_000303_create_notification_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('notification', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'date' => $this->date(),
            'content' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('notification');
    }
}
