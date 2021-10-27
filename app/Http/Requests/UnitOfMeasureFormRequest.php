<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitOfMeasureFormRequest extends FormRequest
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
            'measured_unit' => 'required|max:2',
            'description'   => 'required|max:100'

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'measured_unit' => 'Unidade de Medida',
            'description' => 'Descrição'
        ];
    }
}
