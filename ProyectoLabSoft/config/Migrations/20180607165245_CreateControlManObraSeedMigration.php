<?php
use Migrations\AbstractMigration;

class CreateControlManObraSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('control_man_obra', 1, [
            'fecha' => date('2018-06-06 09:10'),
            'producto' => 'Cuellos',
            'color' => 'Rojo x Blanco x Negro',
            'material' => 'Algodon',
            'talla' => 'L-XL',
            'cantidad' =>  300,
            'ref' => '001',
            'cliente' => 'Carlos A. Espinosa',
            'user_id' => 20
        ]);

        $populator->execute();
    }
}
