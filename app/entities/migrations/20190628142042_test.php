<?php

use Phinx\Migration\AbstractMigration;

class Test extends AbstractMigration
{
    /**
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    protected $name = '';
	
	public function up()
	{
		$table = $this->table('categories');
		$table->addColumn('name', 'string')
			->addColumn('parentId', 'integer', array('default'=>0))
			->create();
		
	}
	
	public function down()
	{
		$this->dropTable('categories');
	}
}
