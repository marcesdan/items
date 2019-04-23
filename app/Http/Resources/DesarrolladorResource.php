<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesarrolladorResource extends JsonResource
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
            'username' => $this->apellido,
            'fullName' => $this->full_name,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'admin' => $this->admin,
        ];
    }
}
