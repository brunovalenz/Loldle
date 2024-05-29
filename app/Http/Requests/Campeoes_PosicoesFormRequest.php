<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Campeoes_PosicoesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'campeoes_idcampeoes' => 'required',
            'posicoes_idposicoes' => 'required',
        ];
        
        return $rules;
    }

    public function messages(){
        return[

            'campeoes_idcampeoes' => 'O campo :attribute é obrigatório ser informado!',
            'posicoes_idposicoes' => 'O campo :attribute é obrigatório ser informado!',
        ];

    }
}
