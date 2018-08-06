<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use App\Cupom;
use App\Exportacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $total = Cliente::all()->count();
         $pulled = Cupom::whereNotNull('pulled_at')->count();
         $export = Exportacao::whereNotNull('done')->count();

         return view('cliente.index', [
             'total' => $total,
             'pulled' => $pulled,
             'exported' => $export,
             'cupom' => '',
             'cliente' => '',
         ]);
     }

     public function show(Request $request)
     {
         $total = Cliente::all()->count();
         $pulled = Cupom::whereNotNull('pulled_at')->count();
         $export = Exportacao::whereNotNull('done')->count();
         $cupom = Cupom::where('code', $request->input('code'))->firstOrFail();
         $cliente = Cliente::where('nr_cpfcnpjedit', $cupom->nr_cpfcnpjedit)->firstOrFail();

         return view('cliente.index', [
             'total' => $total,
             'pulled' => $pulled,
             'exported' => $export,
             'cupom' => $cupom,
             'cliente' => $cliente,
         ]);
     }

    public function resgatar(Request $request)
    {
        $total = Cliente::all()->count();
        $pulled = Cupom::whereNotNull('pulled_at')->count();
        $export = Exportacao::whereNotNull('done')->count();
        $cupom = Cupom::where('code', $request->input('code'))->firstOrFail();
        $cliente = Cliente::where('nr_cpfcnpjedit', $cupom->nr_cpfcnpjedit)->firstOrFail();

        if ( $cupom->is_valid ) {
            $cupom->pulled_at = \Carbon\Carbon::now();
            $cupom->is_valid = 0;
            $cupom->user_id = Auth::user()->id;
            $cupom->save();
        }

        return view('cliente.index', [
            'total' => $total,
            'pulled' => $pulled,
            'exported' => $export,
            'cupom' => $cupom,
            'cliente' => $cliente,
        ]);
    }

    public function exportar(Request $request) {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $exports = Exportacao::whereNull('done')->get();
        $columns = array('nr_cpfcnpjedit', 'nm_pessoa', 'ds_siglalograd', 'nm_logradouro', 'nr_logradouro', 'cd_cep', 'ds_bairro', 'ds_complemento', 'nm_municipio', 'nr_telefone', 'nr_celular', 'nm_estado', 'ds_orgaoexpedidor', 'nr_rg', 'ds_email', 'tp_sexo', 'dt_nascimento', 'ds_twitter', 'ds_facebook', 'ds_instagram');

        $callback = function() use ($exports, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($exports as $export) {
                $cliente = Cliente::where('nr_cpfcnpjedit', $export->nr_cpfcnpjedit)->firstOrFail();

                $export->done = true;
                $export->updated_at = \Carbon\Carbon::now();
                $export->save();

                fputcsv($file, array($cliente->nr_cpfcnpjedit, $cliente->nm_pessoa, $cliente->ds_siglalograd, $cliente->nm_logradouro, $cliente->nr_logradouro, $cliente->cd_cep, $cliente->ds_bairro, $cliente->ds_complemento, $cliente->nm_municipio, $cliente->nr_telefone, $cliente->nr_celular, $cliente->nm_estado, $cliente->ds_orgaoexpedidor, $cliente->nr_rg, $cliente->ds_email, $cliente->tp_sexo, $cliente->dt_nascimento, $cliente->ds_twitter, $cliente->ds_facebook, $cliente->ds_instagram));
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
