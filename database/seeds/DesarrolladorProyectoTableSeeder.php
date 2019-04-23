<?php

use Illuminate\Database\Seeder;

class DesarrolladorProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desarrollador_proyecto')->delete();
        $users = App\Desarrollador::all();
        $proyectos = App\Proyecto::all();
        for ($i = 0; $i < 400; $i++) {
            $user = $users->random();
            $proyecto = $proyectos->random();
            $user->proyectos()->detach($proyecto->id);
            $proyecto->desarrolladores()->attach($user->id);
        }
    }
}
