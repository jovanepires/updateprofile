<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
        'nr_cpfcnpjedit',
        'nm_pessoa',
        'ds_siglalograd',
        'nm_logradouro',
        'nr_logradouro',
        'cd_cep',
        'ds_bairro',
        'ds_complemento',
        'nm_municipio',
        'nr_telefone',
        'nr_celular',
        'nm_estado',
        'ds_orgaoexpedidor',
        'nr_rg',
        'ds_email',
        'tp_sexo',
        'dt_nascimento',
        'ds_twitter',
        'ds_facebook',
        'ds_instagram',
    ];

    protected $table = 'clientes';
}
