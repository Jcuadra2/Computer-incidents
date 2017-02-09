<?php

namespace Incidencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositivoFormRequest extends FormRequest
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
        return [
            'direccion_ip' => 'max:15',
            'marca' => 'required|max:30',
            'modelo' => 'required|max:50',
        ];
    }
}