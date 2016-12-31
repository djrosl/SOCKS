<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m161229_025523_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
            'content' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page');
    }
}
