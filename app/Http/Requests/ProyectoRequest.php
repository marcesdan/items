<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->request->get('lider_id');
        return [
            'id' => 'sometimes',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'fecha_estimada' => 'nullable|date',
            'lider' => 'required:desarrollador,id,'.$id,
        ];
    }
}
