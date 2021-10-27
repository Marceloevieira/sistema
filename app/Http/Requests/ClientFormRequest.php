<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
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
            'name' => 'required|max:200',
            'cgc' => 'required|unique:clients,cgc,NULL,id,deleted_at,NULL',
            'age' => 'required|max:3',
            'sex' => 'required',
            'phone1' => 'required|max:9',
            'mail' => 'required|max:200'

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
            'name' => 'Nome',
            'cgc' => 'CPF/CNPJ',
            'age' => 'Idade',
            'sex' => 'Sexo',
            'phone1' => 'Nº Telefone',
            'mail' => 'E-Mail Address'
        ];
    }
}
