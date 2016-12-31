<?php

use yii\db\Migration;

/**
 * Handles adding title to table `product`.
 */
class m161229_152314_add_title_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product', 'title', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product', 'title');
    }
}
