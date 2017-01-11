<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slide`.
 */
class m170111_121134_create_slide_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slide', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title' => $this->string(),
            'content' => $this->text(),
            'link' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slide');
    }
}
