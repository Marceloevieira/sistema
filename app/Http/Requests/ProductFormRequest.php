<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'description' => 'required|max:100',
            'type_id'  => 'required',
            'group_id' => 'required',
            'um_id'    => 'required'
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
            'description' => 'Descrição',
            'type_id'     => 'Tipo',
            'group_id'    => 'Grupo',
            'um_id'       => 'Primeira Unidade de Medida'
        ];
    }
}
