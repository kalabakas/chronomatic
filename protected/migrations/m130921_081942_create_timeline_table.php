<?php

class m130921_081942_create_timeline_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('timelines', array(
            'id'         => 'pk',
            'user'       => 'string',
            'title'      => 'string',
            'createdAt' => 'datetime',
            'updatedAt' => 'datetime',
            'public'     => 'boolean',
            'cloneOf'    => 'integer',
        ));
	}

	public function down()
	{
        $this->dropTable('timelines');
	}
}
