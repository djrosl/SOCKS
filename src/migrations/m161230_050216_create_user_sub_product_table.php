<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_sub_product`.
 */
class m161230_050216_create_user_sub_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_sub_product', [
            'id' => $this->primaryKey(),
            'user_sub_id' => $this->integer(),
            'product_id' => $this->integer(),
            'gender' => $this->string(),
            'color' => $this->string(),
            'type' => $this->string(),
            'size' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_sub_product');
    }
}
