<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:track,name',
            'duration' => 'required|integer',
            'feat' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome da faixa é obrigatória',
            'name.unique' => 'Faixa já existe',
            'duration.required' => 'É obrigatório informar a duração da faixa',
            'duration.integer' => 'A duração da faixa deve ser informada em segundos e arredondada para o inteiro mais próximo'
        ];
        
    }
}
