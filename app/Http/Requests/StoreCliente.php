<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCliente extends FormRequest
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
            'nr_cpfcnpjedit' => 'required|numeric|unique:clientes',
            'nm_pessoa' => 'required',
            'ds_siglalograd' => 'required',
            'nm_logradouro' => 'required',
            'nr_logradouro' => 'required|numeric',
            'cd_cep' => 'required|numeric',
            'ds_bairro' => 'required',
            'nm_municipio' => 'required',
            'nr_telefone' => 'required',
            'nr_celular' => 'required',
            'nm_estado' => 'required',
            'ds_orgaoexpedidor' => 'required',
            'nr_rg' => 'required',
            'ds_email' => 'required',
            'tp_sexo' => 'required',
            'dt_nascimento'  => 'required',
        ];
    }
}
