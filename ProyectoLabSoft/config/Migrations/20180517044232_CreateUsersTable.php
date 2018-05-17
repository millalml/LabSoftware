<?php
use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('user', 'string', array('limit' => 20))
              ->addColumn('password', 'string')
              ->addColumn('user_type', 'enum', array('values' => 'admin, user_produc, user_puli'))
              ->addColumn('active', 'boolean')
              ->create();
    }
}
