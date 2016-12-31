<?php

use yii\db\Migration;

/**
 * Handles adding image to table `product`.
 */
class m161229_034643_add_image_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'image', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'image');
    }
}
