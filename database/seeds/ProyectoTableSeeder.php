<?php

use Illuminate\Database\Seeder;

class ProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyecto')->delete();
        factory(App\Proyecto::class)->times(100)->create();
    }
}
