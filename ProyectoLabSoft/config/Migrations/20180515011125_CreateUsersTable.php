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
        $table = $this->table('usuarios');
        $table->addColumn('usuario', 'string', array('limit' => 50))
              ->addColumn('password', 'string')
              ->addColumn('tipo_usuario', 'enum', array('values' => 'admin, usuario'))
              ->addColumn('active', 'boolean')
              ->create();
    }
}
