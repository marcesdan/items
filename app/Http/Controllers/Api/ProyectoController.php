<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProyectoResource;
use App\Services\ProyectoService;

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
     * ProyectoController constructor.
     * @param ProyectoService $proyectoSrv
     */
    public function __construct(ProyectoService $proyectoSrv)
    {
        $this->proyectoSrv = $proyectoSrv;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $proyectoes = $this->proyectoSrv->findAll();
        return ProyectoResource::collection($proyectoes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
