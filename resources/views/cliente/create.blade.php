@extends('layouts.default')

@section('title', 'Atualize seu cadastro')

@section('style')
<style type="text/css">

</style>
@stop

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="page-header">
      <h1>{{ $configs->get('app_name') }}</h1>
      <p>{{ $configs->get('app_description') }}</p>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">×</span>
        </button>
        <h4>Ops! verifique os erros abaixo</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (!empty($success))
        <div class="well well-lg text-center">
            <h3>Obrigado!</h3>
            <p>{{ $success }}</p>
            <h4><span class="label label-success">{{ $codigo }}</span></h4>
        </div>
    @else
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>

            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>

            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>

            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>

            </div>

            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
            </div>
        </div>
    </div>

    <form role="form" action="/store" method="post" class="form-cadastro">
        {{ csrf_field() }}

      <div class="setup-content" id="step-1">
          <div class="row">
            <div class="form-group">
              <div class="col-md-6">
                <label for="nr_cpfcnpjedit">CPF/CNPJ</label>
                <input type="text" class="form-control" name="nr_cpfcnpjedit" id="nr_cpfcnpjedit" required="required" placeholder="Ex.: 99999999999" min="0" step="1" value="{{old('nr_cpfcnpjedit')}}">
                <p class="help-block">Insira o CPF/CNPJ conforme cadastrado.<br />(Somente números)</p>
              </div>
            </div>
        </div>
        <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
        <button class="btn btn-primary prevBtn pull-right" type="button">Anterior</button>
      </div>

      <div class="setup-content" id="step-2">
          <div class="form-group">
            <label for="nm_pessoa">Nome</label>
            <input type="text" class="form-control" name="nm_pessoa" id="nm_pessoa" required="required" placeholder="Nome Completo" value="{{ old('nm_pessoa') }}">
            <p class="help-block">Preencha com seu nome completo.</p>
          </div>

          <div class="row">
            <div class="form-group col-md-8">
              <label for="nr_rg">RG</label>
              <input type="text" class="form-control" name="nr_rg" id="nr_rg" required="required" placeholder="RG" value="{{ old('nr_rg') }}">
              <p class="help-block">Preencha conforme o documento de identificação.</p>
            </div>
            <div class="form-group col-md-4">
              <label for="ds_orgaoexpedidor">Orgão Expedidor</label>
              <input type="text" class="form-control" id="ds_orgaoexpedidor" name="ds_orgaoexpedidor" required="required" placeholder="Ex.: SSPCE" value="{{ old('ds_orgaoexpedidor') }}">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="dt_nascimento">Data Nascimento</label>
              <input type="text" class="form-control" id="dt_nascimento" name="dt_nascimento" required="required" placeholder="Ex.: dd/mm/yyyy" value="{{ old('dt_nascimento') }}">
            </div>

            <div class="form-group col-md-6">
              <div class="label-btn-group">
                <label for="tp_sexo">Sexo</label>
              </div>
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default @if(old('tp_sexo') == 'M') active @endif">
                  <input type="radio" name="tp_sexo" value="M" id="male" required="required" autocomplete="off" @if(old('tp_sexo') == 'M') checked @endif> Masculino
                </label>
                <label class="btn btn-default @if(old('tp_sexo') == 'F') active @endif">
                  <input type="radio" name="tp_sexo" value="F" id="female" required="required" autocomplete="off" @if(old('tp_sexo') == 'F') checked @endif> Feminino
                </label>
              </div>
            </div>
          </div>
         <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
         <button class="btn btn-primary prevBtn pull-right" type="button">Anterior</button>
      </div>

      <!-- ENDERECO -->
      <div class="setup-content" id="step-3">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="cd_cep">CEP</label>
              <div class="input-group">
                <input type="text" class="form-control" id="cd_cep" name="cd_cep" required="required" placeholder="Ex.: 99999999" value="{{ old('cd_cep') }}">
                <span class="input-group-btn">
                  <button class="btn btn-primary" id="busca-cep"  type="button">
                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                  </button>
                </span>
              </div>
              <p class="help-block">(Somente números)</p>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="ds_siglalograd">Tipo</label>
              <input type="text" class="form-control" id="ds_siglalograd" name="ds_siglalograd" required="required" placeholder="Ex.: Rua" value="{{ old('ds_siglalograd') }}">
            </div>
            <div class="form-group col-md-9">
              <label for="nm_logradouro">Logradouro</label>
              <input type="text" class="form-control" id="nm_logradouro" name="nm_logradouro" required="required" placeholder="Ex.: (85) 98888-8888" value="{{ old('nm_logradouro') }}">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="nr_logradouro">Número</label>
              <input type="text" class="form-control" id="nr_logradouro" name="nr_logradouro" required="required" placeholder="Ex.: 999" value="{{ old('nr_logradouro') }}">
            </div>
            <div class="form-group col-md-8">
              <label for="ds_complemento">Complemento</label>
              <input type="text" class="form-control" id="ds_complemento" name="ds_complemento" placeholder="Ex.: AP 001" value="{{ old('ds_complemento') }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-5">
              <label for="ds_bairro">Bairro</label>
              <input type="text" class="form-control" id="ds_bairro" name="ds_bairro" required="required" placeholder="Parangaba" value="{{ old('ds_bairro') }}">
            </div>
            <div class="form-group col-md-5">
              <label for="nm_municipio">Município</label>
              <input type="text" class="form-control" id="nm_municipio" name="nm_municipio" required="required" placeholder="Fortaleza" value="{{ old('nm_municipio')}}">
            </div>
            <div class="form-group col-md-2">
              <label for="nm_estado">UF</label>
              <input type="text" class="form-control" id="nm_estado" name="nm_estado" required="required" placeholder="CE" value="{{ old('nm_estado') }}">
            </div>
          </div>
          <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
          <button class="btn btn-primary prevBtn pull-right" type="button">Anterior</button>
      </div>

      <!-- CONTATO -->
      <div class="setup-content" id="step-4">
          <div class="form-group">
            <label for="ds_email">E-mail</label>
            <input type="email" class="form-control" id="ds_email" name="ds_email" required="required" placeholder="Ex.: seuemail@exemplo.com.br" value="{{ old('ds_email') }}">
            <p class="help-block">Insira seu endereço de e-mail.</p>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="nr_telefone">Telefone</label>
              <input type="text" class="form-control" id="nr_telefone" name="nr_telefone" required="required" placeholder="Ex.: (85) 9999-9999" value="{{ old('nr_telefone') }}">
            </div>
            <div class="form-group col-md-4">
              <label for="nr_celular">Celular</label>
              <input type="text" class="form-control" id="nr_celular" name="nr_celular" required="required" placeholder="Ex.: (85) 98888-8888" value="{{ old('nr_celular') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="ds_facebook">Facebook</label>
            <input type="text" class="form-control" id="ds_facebook" name="ds_facebook" placeholder="Ex.: http://facebook.com/seunome" value="{{ old('ds_facebook') }}">
          </div>
          <div class="form-group">
            <label for="ds_twitter">Twitter</label>
            <input type="text" class="form-control" id="ds_twitter" name="ds_twitter" placeholder="Ex.: http://twitter.com/seunome" value="{{ old('ds_twitter') }}">
          </div>
          <div class="form-group">
            <label for="ds_instagram">Instagram</label>
            <input type="text" class="form-control" id="ds_instagram" name="ds_instagram" placeholder="Ex.: http://instagram.com/seunome" value="{{ old('ds_instagram') }}">
          </div>
          <button class="btn btn-primary nextBtn pull-right" type="button">Próximo</button>
          <button class="btn btn-primary prevBtn pull-right" type="button">Anterior</button>
      </div>

      <div class="setup-content" id="step-5">
          <div class="well well-lg text-center">
              <h3>Obrigado!</h3>
              <p>Envie os dados, e aguarde o cupom para resgatar seu prêmio.</p>
              <button class="btn btn-primary blt-lg" type="submit">Enviar Cadastro</button>
          </div>
      </div>

    </form>
    @endif
</div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<!-- Latest compiled and minified JavaScript -->

<script type="text/javascript">
  $(document).ready(function () {
    jQuery(function($){
      $("#nr_cpfcnpjedit").mask("99999999999");
      $("#nr_celular").mask("(99) 9999?9.9999");
      $("#nr_telefone").mask("(99) 9999?9.9999");
      $("#cd_cep").mask("99999999");
      $("#dt_nascimento").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
    });

    $('#busca-cep').on('click', function(){
    $.getJSON('/cep/' + $('#cd_cep').val(), function(d){ 
      $('#ds_siglalograd').val(d.tipo_logradouro);
      $('#nm_logradouro').val(d.logradouro);
      $('#ds_complemento').val(d.complemento);
      $('#ds_bairro').val(d.bairro);
      $('#nm_municipio').val(d.cidade);
      $('#nm_estado').val(d.uf);
    });
    $('#nr_logradouro').focus();
    return false;	
    });

    $('#cd_cep').on('blur', function(){
    $('#busca-cep').trigger('click');
    });

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    console.log("desenvolvido por: @jovanepires  | https://jovanepires.com");

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.attr('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepWizard.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        /* 
         * TO-FIX      
        var btn_sexo = curStep.find("input[name=tp_sexo]");
        if (btn_sexo != null) {
            if(!$(btn_sexo).is(":checked")) {
                $("input[name=tp_sexo]").parent().css("border","1px solid #a94442");  	  
                isValid = false;
            } else {
                $("input[name=tp_sexo]").parent().css("border","none");
                isValid = true;
            } 
        }
        */

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
  });
</script>
@stop
