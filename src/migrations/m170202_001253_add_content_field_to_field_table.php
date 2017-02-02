<?php

use yii\db\Migration;

class m170202_001253_add_content_field_to_field_table extends Migration
{
    public function up()
    {
        $this->addColumn('field', 'content', $this->text());
    }

    public function down()
    {
        $this->dropColumn('field', 'content');
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
