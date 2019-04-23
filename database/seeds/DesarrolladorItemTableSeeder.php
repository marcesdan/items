<?php

use Illuminate\Database\Seeder;

class DesarrolladorItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desarrollador_item')->delete();
        $desarrolladores = App\Desarrollador::all();
        $items = App\Item::all();
        for ($i = 0; $i < 400; $i++) {
            $desarrollador = $desarrolladores->random();
            $item = $items->random();
            $desarrollador->items()->detach($item->id);
            $item->desarrolladores()->attach($desarrollador->id);
        }
    }
}
