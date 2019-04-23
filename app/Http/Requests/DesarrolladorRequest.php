<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesarrolladorRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'id' => 'sometimes',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email',
            'username' => 'required|unique:desarrollador,username,'.$id,
            'admin' => 'required|boolean'
        ];
    }
}
