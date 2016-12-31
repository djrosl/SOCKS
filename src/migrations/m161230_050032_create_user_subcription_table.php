<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_subcription`.
 */
class m161230_050032_create_user_subcription_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_subcription', [
            'id' => $this->primaryKey(),
            'subscription_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_subcription');
    }
}
