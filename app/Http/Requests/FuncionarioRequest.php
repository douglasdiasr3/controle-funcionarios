<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'empresa_id' => 'required|exists:App\Models\Empresas,id',
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Favor preencher o nome',
            'sobrenome.required' => 'Favor preencher o sobrenome',
            'empresa_id.required' => 'Favor selecionar a empresa',

            // ..
        ];
    }
}
