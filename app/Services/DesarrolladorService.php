<?php
/**
 * Created by PhpStorm.
 * DesarrolladorRequest: marces
 * Date: 15/08/18
 * Time: 09:34
 */

namespace App\Services;

use App\Desarrollador;
use Illuminate\Support\Str;

/**
 * Class DesarrolladorService
 * @package App\Services
 */
class DesarrolladorService
{
    /** Retorna todos los usuarios del sistema
     */
    public function findAll()
    {
        return Desarrollador::all();
    }

    /** Retona el usuario con un $id
     * @param $id
     * @return Desarrollador
     */
    public function find($id)
    {
        return Desarrollador::findOrFail($id);
    }

    /** Regista un usuario en el sistema
     * @param $input , campos del nuevo usuario
     * @return Desarrollador, el usuario registrado
     */
    public function create(array $input)
    {
        $desarrollador = new Desarrollador($input);
        return $this->save($desarrollador, $input);
    }

    /** Actualiza el $user dado con $input
     * @param $input
     * @param Desarrollador $desarrollador
     * @return Desarrollador
     */
    public function update(array $input, Desarrollador $desarrollador)
    {
        $desarrollador->fill($input);
        return $this->save($desarrollador, $input);
    }

    /**
     * @param Desarrollador $desarrollador
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Desarrollador $desarrollador)
    {
        return $desarrollador->delete();
    }

    protected function save(Desarrollador $desarrollador, array $input)
    {
        $desarrollador->assignRole('user');
        if ($input['admin']) {
            $desarrollador->assignRole('admin');
        }
        $desarrollador->password = bcrypt(Str::random());
        $desarrollador->save();
        return $desarrollador;
    }
}
