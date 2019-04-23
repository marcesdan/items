<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'tipo' => $this->tipoItem->nombre,
            'prioridad' => $this->prioridad,
            'responsable' => $this->getResponsable()->full_name,
            'created_at' => $this->created_at,
            'fechaEstimada' => $this->fecha_estimada,
            'updated_at' => $this->updated_at,
        ];
    }
}
