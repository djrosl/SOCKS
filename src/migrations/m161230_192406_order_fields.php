<?php

use yii\db\Migration;

class m161230_192406_order_fields extends Migration
{
    public function up()
    {

        $this->addColumn('user_subcription', 'date_start', $this->date());
        $this->addColumn('user_subcription', 'date_end', $this->date());

    }

    public function down()
    {
        echo "m161230_192406_order_fields cannot be reverted.\n";

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
