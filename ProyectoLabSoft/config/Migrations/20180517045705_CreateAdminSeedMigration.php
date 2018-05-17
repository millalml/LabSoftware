<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users', 1, [
            'user' => 'Milla',
            'password' => function () {
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash('milla123');
            },
            'user_type' => 'admin',
            'active' => 1
        ]);

        $populator->execute();
    }
}
