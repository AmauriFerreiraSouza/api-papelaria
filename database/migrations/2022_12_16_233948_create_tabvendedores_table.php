<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabvendedores', function (Blueprint $table) {
            $table->id('Codigo');
            $table->char('Situacao', 1)->default("");
            $table->tinyInteger('Filial')->unsigned()->default(0);
            $table->string('Nome', 40)->default("");
            $table->string('Endereco', 40)->default("");
            $table->string('Bairro', 20)->default("");
            $table->string('Cidade', 20)->default("");
            $table->char('Estado', 2)->default("");
            $table->string('Cep', 9)->default(0);
            $table->string('Fone', 15)->default("");
            $table->string('Fax', 15)->default("")->nullable();
            $table->string('Contato', 200)->default("");
            $table->char('FisJur', 1)->default("");
            $table->string('CgcCpf', 18)->default("");
            $table->string('InscRg', 18)->default("");
            $table->char('Tipo', 1)->default("");
            $table->decimal('Comissao', 5,2)->default("0.00");
            $table->char('GeraArq', 1)->default("N");
            $table->char('Consumo', 1)->default("N");
            $table->tinyInteger('Canal')->unsigned()->default(0);
            $table->char('ShowRoom', 1)->default("N");
            $table->string('Senha')->nullable(false);
            $table->tinyInteger('Controle')->unsigned()->default(1);
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
        Schema::dropIfExists('tabvendedores');
    }
};
