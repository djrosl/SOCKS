<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m161229_030042_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'consist' => $this->string(),
            'colors' => $this->string(),
            'description' => $this->text(),
            'sizes' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
