<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exportacao extends Model
{
    //
    protected $fillable = ['nr_cpfcnpjedit'];
    protected $table = 'exportacoes';
}
