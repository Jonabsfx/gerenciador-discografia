<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:albums,name',
            'year' => 'required|between:1900,2100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome do álbum é obrigatório',
            'name.unique' => 'Álbum já existe',
            'year.required' => 'Ano de lançamento é obrigatório',
            'year.between' => 'O ano de lançamento deve ser válido. Informe um ano entre 1900 e 2100'
        ];
        
    }
}
