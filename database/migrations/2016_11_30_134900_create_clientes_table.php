<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->char('nr_cpfcnpjedit', 14)->unique();
            $table->string('nm_pessoa', 60);
            $table->string('ds_siglalograd', 10);
            $table->string('nm_logradouro', 60);
            $table->string('nr_logradouro', 5);
            $table->char('cd_cep', 8);
            $table->string('ds_bairro', 60);
            $table->string('ds_complemento', 65);
            $table->string('nm_municipio', 60);
            $table->string('nr_telefone', 20);
            $table->string('nm_estado', 60);
            $table->string('ds_orgaoexpedidor', 10);
            $table->string('nr_rg', 20);
            $table->string('ds_email', 60);
            $table->text('ds_redesocial')->nullable();
            $table->char('tp_sexo', 1);
            $table->string('dt_nascimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
