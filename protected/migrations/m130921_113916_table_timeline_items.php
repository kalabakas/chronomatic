<?php

class m130921_113916_table_timeline_items extends CDbMigration
{
	public function up()
	{
        $this->createTable('timeline_items', array(
            'timeline' => 'integer',
            'item'     => 'integer',
            'PRIMARY KEY(timeline,item)',
        ));
	}

	public function down()
	{
        $this->dropTable('timeline_items');
	}
}
