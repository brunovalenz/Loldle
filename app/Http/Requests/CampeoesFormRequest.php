<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampeoesFormRequest extends FormRequest
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
            'nome' => 'required',
            'imagem' => '|image|mimes:jpeg,png,jpg,gif',
            'genero' => 'required',
            'ano' => 'required',
            'recursos_idrecursos' => 'required',
            'alcances_idalcances' => 'required',
        ];

        return $rules;
            
    }

    public function messages(){

        return [
            'nome' => 'O campo :attribute é obrigatório ser informado!',
            
            'genero' => 'O campo :attribute é obrigatório ser informado!',
            'ano' => 'O campo :attribute é obrigatório ser informado!',
            'recursos_idrecursos' => 'O campo :attribute é obrigatório ser informado!',
            'alcances_idalcances' => 'O campo :attribute é obrigatório ser informado!',
        ];
    }
}
