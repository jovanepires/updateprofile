<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaCEPController extends Controller
{
    //
    public function __invoke($cep)
    {
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=json');
        if(!$resultado){
            $resultado = "{\"resultado\":\"0\", \"resultado_txt\":\"erro ao buscar cep\"";
        }

        return $resultado;
    }
}
