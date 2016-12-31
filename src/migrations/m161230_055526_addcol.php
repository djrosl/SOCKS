<?php

use yii\db\Migration;

class m161230_055526_addcol extends Migration
{
    public function up()
    {

        $this->addColumn('user_subcription', 'date', $this->dateTime());
        $this->addColumn('user_subcription', 'status', $this->integer());

    }

    public function down()
    {
        echo "m161230_055526_addcol cannot be reverted.\n";

        return false;
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
