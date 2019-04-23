<?php

namespace App\Http\Controllers;

use App\Services\DesarrolladorService;
use App\Services\ItemService;
use App\Http\Requests\ItemRequest;

/**
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    /**
     * @var ItemService
     */
    protected $itemSrv;
    /**
     * @var DesarrolladorService
     */
    protected $desarrolladorSrv;

    /**
     * ItemController constructor.
     * @param ItemService $itemSrv
     * @param DesarrolladorService $desarrolladorSrv
     */
    public function __construct(ItemService $itemSrv, DesarrolladorService $desarrolladorSrv)
    {
        $this->itemSrv = $itemSrv;
        $this->desarrolladorSrv = $desarrolladorSrv;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return view('items.create', ['desarrolladores' => $desarrolladores]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->itemSrv->findAll();
        return view('items.index', ['items' => $items]);
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = $this->itemSrv->find($id);
        return view('items.show', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ItemRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $validatedData = $request->validated();
        $this->itemSrv->create($validatedData);
        return redirect()->route('admin.items.index')->with('status', 'Item creado con éxito!');
    }

    /**
     * Edit the specified resource.
     *
     * @param int $id
     * @return UserResource
     */
    public function edit($id)
    {
        $item = $this->itemSrv->find($id);
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return view('items.edit', ['item' => $item, 'desarrolladores' => $desarrolladores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ItemRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = $this->itemSrv->find($id);
        $validatedData = $request->validated();
        $this->itemSrv->update($validatedData, $item);
        return redirect()->route('admin.items.index')->with('status', 'Item editado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = $this->itemSrv->find($id);
        $this->itemSrv->destroy($item);
        return parent::ok();
    }
}
