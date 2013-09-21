<?php

class m130921_113222_items_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('items', array(
            'itemId'    => 'pk',
            'id'        => 'string',
            'title'      => 'string',
            'type'     => 'string',
            'thumb'     => 'string',
            'createdAt' => 'datetime',
        ));
	}

	public function down()
	{
        $this->dropTable('items');
	}
}
