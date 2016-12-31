<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscription`.
 */
class m161230_041049_create_subscription_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subscription', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'length' => $this->string(),
            'price' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subscription');
    }
}
