<?php

use yii\db\Migration;

class m161230_092129_add_column_to_user_subcription_table extends Migration
{
    public function up()
    {

        $this->addColumn('user_subcription', 'address',$this->string());
        $this->addColumn('user_subcription', 'phone',$this->string());

    }

    public function down()
    {
        echo "m161230_092129_add_column_to_user_subcription_table cannot be reverted.\n";

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
