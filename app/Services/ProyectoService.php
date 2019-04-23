<?php
/**
 * Created by PhpStorm.
 * ProyectoRequest: marces
 * Date: 15/08/18
 * Time: 09:34
 */

namespace App\Services;

use App\Proyecto;

/**
 * Class ProyectoService
 * @package App\Services
 */
class ProyectoService
{
    /** Retorna todos los usuarios del sistema
     */
    public function findAll()
    {
        return Proyecto::all();
    }

    /** Retona el usuario con un $id
     * @param $id
     * @return Proyecto
     */
    public function find($id)
    {
        return Proyecto::findOrFail($id);
    }

    /** Regista un nuevo proyecto en el sistema
     * @param $input, campos del nuevo proyecto
     * @return Proyecto, el nuevo proyecto
     */
    public function create(array $input)
    {
        $proyecto = new Proyecto($input);
        return $this->save($proyecto, $input);
    }

    /** Actualiza el $proyecto dado con $input
     * @param $input
     * @param Proyecto $proyecto
     * @return Proyecto
     */
    public function update(array $input, Proyecto $proyecto)
    {
        $proyecto->fill($input);
        return $this->save($proyecto, $input);
    }


    /**
     * @param Proyecto $proyecto
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Proyecto $proyecto)
    {
        return $proyecto->delete();
    }

    protected function save(Proyecto $proyecto, array $input)
    {
        $proyecto->lider()->associate($input['lider']);
        $proyecto->save();
        return $proyecto;
    }
}
