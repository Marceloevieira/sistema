<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetFormRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'address' => 'required|max:100',
            'ddd' => 'required|max:2',
            'phone' => 'required|max:9',
            'payment_condition_id' => 'required|exists:payment_conditions,id',
            'deadline' => 'required',
            'expiration_date' => 'required|date'
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
            'client_id' => 'Cliente',
            'address' => 'Endereço',
            'ddd' => 'DDD',
            'phone' => 'Nº Telefone',
            'payment_condition_id' => 'Condição pagamento',
            'deadline' => 'Prazo entrega',
            'expiration_date' => 'Data Validade'
        ];
    }
}
