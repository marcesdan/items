<?php

namespace App\Http\Controllers;

use App\Services\DesarrolladorService;
use App\Services\ProyectoService;
use App\Http\Requests\ProyectoRequest;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * @var ProyectoService
     */
    protected $proyectoSrv;
    /**
     * @var DesarrolladorService
     */
    protected $desarrolladorSrv;

    /**
     * ProyectoController constructor.
     * @param ProyectoService $proyectoSrv
     * @param DesarrolladorService $desarrolladorSrv
     */
    public function __construct(ProyectoService $proyectoSrv, DesarrolladorService $desarrolladorSrv)
    {
        $this->proyectoSrv = $proyectoSrv;
        $this->desarrolladorSrv = $desarrolladorSrv;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return view('proyectos.create', ['desarrolladores' => $desarrolladores]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $proyectos = $this->proyectoSrv->findAll();
        return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $proyecto = $this->proyectoSrv->find($id);
        return view('proyectos.show', ['proyecto' => $proyecto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProyectoRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequest $request)
    {
        $validatedData = $request->validated();
        $this->proyectoSrv->create($validatedData);
        return redirect()->route('admin.proyectos.index')->with('status', 'Proyecto creado con éxito!');
    }

    /**
     * Edit the specified resource.
     *
     * @param int $id
     * @return UserResource
     */
    public function edit($id)
    {
        $proyecto = $this->proyectoSrv->find($id);
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return view('proyectos.edit', ['proyecto' => $proyecto, 'desarrolladores' => $desarrolladores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProyectoRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectoRequest $request, $id)
    {
        $proyecto = $this->proyectoSrv->find($id);
        $validatedData = $request->validated();
        $this->proyectoSrv->update($validatedData, $proyecto);
        return redirect()->route('admin.proyectos.index')->with('status', 'Proyecto editado con éxito!');
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
        $proyecto = $this->proyectoSrv->find($id);
        $this->proyectoSrv->destroy($proyecto);
        return parent::ok();
    }
}
