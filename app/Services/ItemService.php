<?php
/**
 * Created by PhpStorm.
 * ItemRequest: marces
 * Date: 15/08/18
 * Time: 09:34
 */

namespace App\Services;

use App\Estado;
use App\Item;

/**
 * Class ItemService
 * @package App\Services
 */
class ItemService
{
    /** Retorna todos los usuarios del sistema
     */
    public function findAll()
    {
        return Item::all();
    }

    /** Retona el usuario con un $id
     * @param $id
     * @return Item
     */
    public function find($id)
    {
        return Item::findOrFail($id);
    }

    /** Regista un nuevo item en el sistema
     * @param $input , campos del nuevo item
     * @return Item, el nuevo item
     */
    public function create(array $input)
    {
        $item = new Item($input);
        return $this->save($item, $input);
    }

    /** Actualiza el $item dado con $input
     * @param $input
     * @param Item $item
     * @return Item
     */
    public function update(array $input, Item $item)
    {
        $item->fill($input);
        return $this->save($item, $input);
    }


    /**
     * @param Item $item
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        return $item->delete();
    }

    protected function save(Item $item, array $input)
    {
        $estado_inicial = Estado::where('nombre', 'Creado');
        $item->setEstadoActual($input['responsable'], $estado_inicial);
        $item->save();
        return $item;
    }
}
