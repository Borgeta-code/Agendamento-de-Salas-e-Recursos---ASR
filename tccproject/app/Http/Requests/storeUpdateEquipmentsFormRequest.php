<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeUpdateEquipmentsFormRequest extends FormRequest
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
        $rules = [
            'nomeEquipamento' => [
                'required',
                'string',
                Rule::unique('equipamento')->ignore($this->id),
                'max:191'
            ], 
            'tipoEquipamento' => [
                'required',
                'string',
                'max:191'
            ], 
            'quantidadeEquipamento' => [
                'required',
                'int'
            ]
        ];

        return $rules;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nomeEquipamento.required' => 'O nome do equipamento é obrigatório!',
            'nomeEquipamento.unique' => 'Um equipamento com esse nome já está cadastrado!',
            'nomeEquipamento.max' => 'O limite é de 191 caracteres para o nome do equipamento!',
            'tipoEquipamento.required' => 'O tipo do equipamento é obrigatório!',
            'tipoEquipamento.max' => 'O limite é de 191 caracteres para o tipo do equipamento!',
            'quantidadeEquipamento.required' => 'A quantidade de equipamentos é obrigatória!',
        ];
    }   
}
