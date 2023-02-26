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
        Schema::create('tabclientes', function (Blueprint $table) {
            $table->id('Codigo');
            $table->mediumInteger('CodRep')->unsigned()->default(0);
            $table->mediumInteger('ClieSite')->default(0);
            $table->char('FisJur', 1)->default("");
            $table->string('CgcCpf', 18)->default("");
            $table->char('Situacao', 1)->default("");
            $table->char('Tipo', 1)->default("R");
            $table->char('Exterior', 1)->default("N");
            $table->string('Razao', 60)->default("");
            $table->string('Endereco')->default("");
            $table->string('NumEnd', 10)->default("");

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
        Schema::dropIfExists('tabclientes');
    }
};
