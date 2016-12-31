<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `profile`.
 */
class m161229_125022_add_phone_column_to_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('profile', 'phone', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('profile', 'phone');
    }
}
