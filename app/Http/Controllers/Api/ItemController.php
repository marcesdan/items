<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Services\ItemService;

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
     * ItemController constructor.
     * @param ItemService $itemSrv
     */
    public function __construct(ItemService $itemSrv)
    {
        $this->itemSrv = $itemSrv;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $items = $this->itemSrv->findAll();
        return ItemResource::collection($items);
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
        $item = $this->itemSrv->find($id);
        $this->itemSrv->destroy($item);
        return parent::ok();
    }
}
