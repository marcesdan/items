<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DesarrolladorResource;
use App\Services\DesarrolladorService;

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
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $desarrolladores = $this->desarrolladorSrv->findAll();
        return DesarrolladorResource::collection($desarrolladores);
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
        $desarrollador = $this->desarrolladorSrv->find($id);
        $this->desarrolladorSrv->destroy($desarrollador);
        return parent::ok();
    }
}
