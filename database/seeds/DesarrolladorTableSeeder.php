<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DesarrolladorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desarrollador')->delete();
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        factory(App\Desarrollador::class)->times(100)->create();

        // me creo como administrador :)
        $desarrollador = new App\Desarrollador();
        $desarrollador->nombre = 'Mariano';
        $desarrollador->apellido = "D'Angelo";
        $desarrollador->username = "marces";
        $desarrollador->email = 'marianod93@gmail.com';
        $desarrollador->telefono = '2901-606964';
        $desarrollador->password = bcrypt('secret');
        $desarrollador->assignRole('admin', 'user');
        $desarrollador->save();
    }
}
