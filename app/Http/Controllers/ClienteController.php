<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCliente;
use App\Cliente;
use App\Cupom;
use App\Exportacao;

class ClienteController extends Controller
{
    //
    public function create()
    {
        return view('cliente.create');
    }

    public function store(StoreCliente $request)
    {
        $cliente = new Cliente($request->except('_token'));
        $saved = $cliente->save();

        if(!$saved){
            App::abort(500, 'Erro ao salvar os dados do cliente.');
        }

        $cupom = new Cupom();
        $cupom->nr_cpfcnpjedit = $cliente->nr_cpfcnpjedit;
        $cupom->is_valid = true;
        $cupom->code = $this->getNewCode();
        $saved = $cupom->save();

        if(!$saved){
            $cliente->destroy(); // remove o cadastro sem cupom
            App::abort(500, 'Erro ao salvar os dados do cupom.');
        }

        $exportacao = new Exportacao(['nr_cpfcnpjedit' => $cliente->nr_cpfcnpjedit]);
        $exportacao->save();

        return view('cliente.create', ['codigo' => $cupom->code])->withSuccess('Utilize o código abaixo para resgatar seu prêmio');
    }

    private function getNewCode() {
        $str = substr(md5(uniqid(rand(), true)), 0, 12);
        $cupom = Cupom::where('code', $str)->first();

        if (!$cupom) {
            return $str;
        }

        return $this->getNewCode();
    }
}
