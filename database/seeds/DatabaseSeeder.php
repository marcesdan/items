<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DesarrolladorTableSeeder::class);
        $this->call(ProyectoTableSeeder::class);
        $this->call(DesarrolladorProyectoTableSeeder::class);
        $this->call(TipoItemTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(DesarrolladorItemTableSeeder::class);
    }
}
