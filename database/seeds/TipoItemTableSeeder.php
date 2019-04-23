<?php

use Illuminate\Database\Seeder;

class TipoItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_item')->delete();
        DB::table('estado')->delete();

        // se crean los estados
        $creado = App\Estado::create([
            'nombre' => 'Creado',
            'descripcion' => 'El punto de inicio de todo ítem'
        ])->id;
        $analisis = App\Estado::create([
            'nombre' => 'Análisis',
            'descripcion' => 'Se está analizando el problema y la solución del ítem'
        ])->id;
        $desarrollo = App\Estado::create([
            'nombre' => 'Desarrollo',
            'descripcion' => 'El ítem se encuentra en pleno proceso de desarrollo'
        ])->id;
        $validacion = App\Estado::create([
            'nombre' => 'Validación',
            'descripcion' => 'El ítem está siendo validado con las partes correspondientes'
        ])->id;
        $testing = App\Estado::create([
            'nombre' => 'Testing',
            'descripcion' => 'El ítem está siendo testeado de posibles errores'
        ])->id;
        $evaluacion = App\Estado::create([
            'nombre' => 'Evaluación de usuario',
            'descripcion' => 'El ítem está siendo evaluado por el usuario'
        ])->id;
        $finalizado = App\Estado::create([
            'nombre' => 'Finalizado',
            'descripcion' => 'El ciclo de vida del ítem finalizó correctamente'
        ])->id;

        // se crea el tipo de item bug
        $bug = App\TipoItem::create([
            'nombre' => 'Reporte de bug',
        ]);
        $id = $bug->id;
        // se acocian los estados al tipo de item (nodos del grafo)
        $bug->estados()->attach([
            $creado,
            $desarrollo,
            $validacion,
            $finalizado,
        ]);
        // se acocian los workflows posibles al tipo de item (aristas del grafo)
        $bug->workflow()->createMany([
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $creado,
                'estado_to_id' => $desarrollo,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $desarrollo,
                'estado_to_id' => $validacion,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $validacion,
                'estado_to_id' => $desarrollo,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $validacion,
                'estado_to_id' => $finalizado,
            ]
        ]);

        // se crea el tipo de item nuevo requerimiento
        $nuevoReq = App\TipoItem::create([
            'nombre' => 'Nuevo requerimiento',
        ]);
        $id = $nuevoReq->id;
        // se acocian los estados al tipo de item (nodos del grafo)
        $nuevoReq->estados()->attach([
            $creado,
            $analisis,
            $desarrollo,
            $testing,
            $evaluacion,
            $finalizado,
        ]);
        // se acocian los workflows posibles al tipo de item (aristas del grafo)
        $nuevoReq->workflow()->createMany([
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $creado,
                'estado_to_id' => $analisis,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $analisis,
                'estado_to_id' => $desarrollo,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $analisis,
                'estado_to_id' => $finalizado,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $desarrollo,
                'estado_to_id' => $analisis,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $desarrollo,
                'estado_to_id' => $testing,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $testing,
                'estado_to_id' => $analisis,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $testing,
                'estado_to_id' => $desarrollo,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $testing,
                'estado_to_id' => $evaluacion,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $evaluacion,
                'estado_to_id' => $analisis,
            ],
            [
                'tipo_item_id' => $id,
                'estado_from_id' => $evaluacion,
                'estado_to_id' => $finalizado,
            ],
        ]);
    }
}
