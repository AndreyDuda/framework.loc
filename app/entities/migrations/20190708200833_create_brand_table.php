<?php

use Phinx\Migration\AbstractMigration;

class CreateBrandTable extends AbstractMigration
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

    public function up()
    {
        $this->table('brands')
            ->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('alias', 'string', ['limit' => 255, 'null' => false, ])
            ->addColumn('img', 'string', ['limit' => 255,'default' => 'brand_default.jpg', 'null' => false])
            ->addColumn('description', 'string', ['limit' => 255, 'null' => false])
            ->addIndex(['alias'], ['unique' => true])
            ->save();
    }

    public function down()
    {
        $this->dropTable('brands');
    }
}
