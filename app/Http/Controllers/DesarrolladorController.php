<?php

namespace App\Http\Controllers;

use App\Services\DesarrolladorService;
use App\Http\Requests\DesarrolladorRequest;

/**
 * Class DesarrolladorController
 * @package App\Http\Controllers
 */
class DesarrolladorController extends Controller
{
    /**
     * @var DesarrolladorService
     */
    protected $desarrolladorSrv;

    /**
     * DesarrolladorController constructor.
     * @param DesarrolladorService $desarrolladorSrv
     */
    public function __construct(DesarrolladorService $desarrolladorSrv)
    {
        $this->desarrolladorSrv = $desarrolladorSrv;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('desarrolladores.create');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return view('desarrolladores.index', ['desarrolladores' => $desarrolladores]);
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $desarrollador = $this->desarrolladorSrv->find($id);
        return view('desarrolladores.show', ['desarrollador' => $desarrollador]);
    }

    /**
     * Edit the specified resource.
     *
     * @param int $id
     * @return UserResource
     */
    public function edit($id)
    {
        $desarrollador = $this->desarrolladorSrv->find($id);
        return view('desarrolladores.edit', ['desarrollador' => $desarrollador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\DesarrolladorRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesarrolladorRequest $request, $id)
    {
        $desarrollador = $this->desarrolladorSrv->find($id);
        $validatedData = $request->validated();
        $this->desarrolladorSrv->update($validatedData, $desarrollador);
        return redirect()->route('admin.desarrolladores.index')->with('status', 'Desarrollador editado con éxito!');
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
        $desarrollador = $this->desarrolladorSrv->find($id);
        $this->desarrolladorSrv->destroy($desarrollador);
        return parent::ok();
    }
}
