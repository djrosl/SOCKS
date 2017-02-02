<?php

use yii\db\Migration;

/**
 * Handles the creation of table `field`.
 */
class m170202_001012_create_field_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('field', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('field');
    }
}
