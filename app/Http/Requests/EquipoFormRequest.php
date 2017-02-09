<?php

namespace Incidencias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Incidencias\Foundation\Http\FormRequest;

class EquipoFormRequest extends FormRequest
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
            'memoria' => 'required|max:50',
            'procesador' => 'required|max:50',
            'grafica' => 'required|max:50',
            'red' => 'required|max:50',
            'alimentacion' => 'required|max:50',
        ];
    }
}
