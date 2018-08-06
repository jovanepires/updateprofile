@extends('layouts.default')

@section('title', 'Atualize seu cadastro')

@section('style')
<style type="text/css">

</style>
@stop

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="page-header">
      <h1>Atualizar Cadastro</h1>
    </div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <p>Bem vindo(a), {{ Auth::user()->name }}. |
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> sair </a>
        </p>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <h4>Status da campanha:</h4>
        <ul>
            <li><span>{{ $total }} clientes cadastrados.</span></li>
            <li><span>{{ $pulled }} clientes receberam seus prêmios.</span></li>
            <li><span>{{ $exported }} clientes exportados para o sistema.</span> <a class="" href="/exportar"><span class="badge">exportar</badge></a></li>
        </ul>
    </div>
    <form role="form" action="/show" method="post" class="form-cadastro form-inline">
        {{ csrf_field() }}
        <h3>Validar prêmio do cliente</h3>
        <hr />
        <div class="form-group">
            <input type="text" class="form-control" name="code" id="code" required="required" placeholder="Código do cupom." value="{{old('code')}}">
        </div>
        <input class="form-control btn btn-primary blt-lg" type="submit" value="Buscar Cliente">
    </form>
    <hr />
    @if ($cliente)
    <div class="">
        <h4>Cliente: {{ $cliente->nm_pessoa }}</h4>
        <ul>
            <li><strong>CPF/CNPJ:</strong> {{ $cliente->nr_cpfcnpjedit }}</li>
            <li><strong>Cupom:</strong> {{ $cupom->code }} ({{ $cupom->is_valid ? 'válido' : 'inválido' }})</li>
            <li><strong>Resgatado:</strong> {{ !$cupom->pulled_at ? 'Não resgatado' : $cupom->pulled_at }}</li>
        </ul>
        @if ($cupom->is_valid)
        <form role="form" action="/resgatar" method="post" class="">
            {{ csrf_field() }}
            <input type="hidden" name="code" value="{{ $cupom->code }}">
            <button class="btn btn-primary blt-lg" type="submit">Resgatar</button>
        </div>
        @endif
    </div>
    @endif
</div>


@stop
