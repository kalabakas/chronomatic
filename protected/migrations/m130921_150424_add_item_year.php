<?php

class m130921_150424_add_item_year extends CDbMigration
{
	public function up()
	{
	$this->addColumn('items','year','integer');
	}

	public function down()
	{
	$this->dropColumn('items','year');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
