<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'logotipo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Favor preencher o campo nome da empresa',
            'logotipo.image' => 'O logotipo deve ser uma imagem',
            'logotipo.dimensions' => 'O logotipo deve ter no minimo 100 pixels de altura e largura',

            // ..
        ];
    }
}
