<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\default_ca_bundle;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabprodutos', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('CodProFor', 14)->default("");
            $table->char('Situacao', 1)->default('A');
            $table->string('Descricao', 60);
            $table->text('DescriTec');
            $table->string('DescriInMetro', 400)->default("");
            $table->text('DescriPublic');
            $table->smallInteger('CodGru')->unsigned()->default(0);
            $table->smallInteger('SubGru')->unsigned()->default(0);
            $table->mediumInteger('CodGru2')->unsigned()->default(0);
            $table->mediumInteger('SubGru2')->unsigned()->default(0);
            $table->smallInteger('CodFab')->unsigned()->default(0);
            //
            $table->mediumInteger('CodFor')->unsigned()->default(0);
            $table->mediumInteger('CodDes')->unsigned()->default(0);
            $table->char('Curva', 1)->default('C');
            $table->smallInteger('Comprador')->unsigned()->default(0);
            $table->char('IcmDif', 1)->default('N');
            $table->char('FatSep', 1)->default('N');
            $table->char('Proibe', 1)->default('N');
            $table->char('AtuSite', 1)->default('S');
            $table->decimal('PesoL', 8,3)->default('0.000');
            $table->decimal('PesoB', 8,3)->default('0.000');
            //
            $table->decimal('AtaPesoBru', 8,3)->default('0.000');
            $table->decimal('AtaAltura', 5,2)->default('0.00');
            $table->decimal('AtaLargura', 5,2)->default('0.00');
            $table->decimal('AtaProfund', 5,2)->default('0.00');
            $table->decimal('MstPesoBru', 8,3)->default('0.000');
            $table->decimal('MstPesoLiq', 8,3)->default('0.000');
            $table->decimal('MstAltura', 5,2)->default('0.00');
            $table->decimal('MstLargura', 5,2)->default('0.00');
            $table->decimal('MstProfund', 5,2)->default('0.00');
            $table->decimal('UniPesoBru', 8,3)->default('0.000');
            //
            $table->decimal('UniAltura', 5,2)->default('0.00');
            $table->decimal('UniLargura', 5,2)->default('0.00');
            $table->decimal('UniProfund', 2,2)->default('0.00');
            $table->string('ClaFis', 15)->default("");
            $table->char('CodTrib', 3)->default("");
            $table->decimal('PerIpi', 5,2)->default('0.00');
            $table->decimal('PerPis', 5,2)->default('1.60');
            $table->decimal('PerCofins', 5,2)->default('0.00');
            $table->date('DatLib')->nullable();
            $table->decimal('PerCom', 5,2)->default('0.00');
            //
            $table->string('Foto', 30)->default("");
            $table->decimal('Margem', 7,2)->default('0.00');
            $table->decimal('MargMinCpr', 7,2)->default('0.00');
            $table->decimal('IvaDentro', 5,2)->default('0.00');
            $table->decimal('IvaFora', 5,2)->default('0.00');
            $table->decimal('MargMin', 5,2)->default('0.00');
            $table->decimal('CustoAnt', 12,2)->default('0.00');
            $table->decimal('MedioAnt', 12,2)->default('0.00');
            $table->decimal('PrecoNF', 12,2)->default('0.00');
            $table->decimal('CusDolar', 12,4)->default('0.0000');
            //
            $table->decimal('PreDolar', 12,4)->default('0.0000');
            $table->decimal('CusMedio',12,2)->default('0.00');
            $table->decimal('PreLoj', 12,2)->default('0.00');
            $table->decimal('PreRep', 12,2)->default('0.00');
            $table->decimal('PreAtu', 12,2)->default('0.00');
            $table->decimal('PreAnt', 12,2)->default('0.00');
            $table->decimal('PreTrf', 12,2)->default('0.00');
            $table->decimal('PreSC', 12,2)->default('0.00');
            $table->decimal('PreSite', 12,2)->default('0.00');
            $table->decimal('PrePromo', 12,2)->default('0.00');
            //
            $table->date('VldPromo')->nullable();
            $table->decimal('BaseSTFor', 12,2)->default('0.00');
            $table->decimal('ValorSTFor', 12,2)->default('0.00');
            $table->char('MasterIni', 2)->default("");
            $table->smallInteger('MasterQtd')->unsigned()->default(0);
            $table->char('MasterFin', 2)->default(0);
            $table->char('EmbIni', 2)->default(0);
            $table->smallInteger('EmbQtd')->unsigned()->default(0);
            $table->char('EmbFin', 2)->default("");
            $table->mediumInteger('Fator')->unsigned()->default(0);
            //
            $table->smallInteger('FatorCons')->unsigned()->default(1);
            $table->mediumInteger('FatorCamp')->default(0);
            $table->string('CodBarMaster', 15)->default("");
            $table->string('CodBarMst', 15)->default("");
            $table->string('CodBarUnid', 15)->default("");
            $table->date('UltCpr')->nullable();
            $table->smallInteger('QtdFornec')->unsigned()->default(0);
            $table->smallInteger('EmbInner')->unsigned()->default(0);
            $table->decimal('Desconto', 5,2)->default('0.00');
            $table->smallInteger('DescQtd')->unsigned()->default('999');
            //
            $table->decimal('DescLimTelev', 10,)->unsigned()->default('0.00');
            $table->decimal('DescLimRepre', 5,2)->unsigned()->default('0.00');
            $table->string('Imagem1', 12)->default("");
            $table->string('Imagem2', 12)->default("");
            $table->string('Imagem3', 12)->default("");
            $table->string('Imagem4', 12)->default("");
            $table->tinyInteger('Controle')->unsigned()->default(0);
            $table->char('VendeMatriz')->default("S");
            $table->char('Mala')->nullable()->default("S");
            $table->char('Apoio')->default("S");
            //
            $table->date('DatCad')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('DatAlt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuInc')->default(0);
            $table->smallInteger('UsuAlt')->default(0);
            $table->char('Home')->default("H");
            $table->string('Observ', 100)->default("");
            $table->decimal('Custo', 12,2)->default("0.00");
            $table->date('DataDesativ')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuDesativ')->unsigned()->default(0);
            $table->string('MotProibe', 30)->nullable();
            //
            $table->date('DatProibe')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuProibe')->unsigned()->default(0);
            $table->char('Inventario', 1)->default("N");
            $table->char('Consignado', 1)->default("N");
            $table->string('CodCest', 7)->default(0);
            $table->tinyInteger('Classificacao')->unsigned()->default(0);
            $table->tinyInteger('Sazonalidade')->unsigned()->default(0);
            $table->mediumInteger('CodBrinde')->unsigned()->default(0);
            $table->mediumInteger('QtdBrinde')->unsigned()->default(0);
            $table->smallInteger('UsuAltPre')->unsigned()->default(0);
            //
            $table->char('VendaFil', 1)->default("N");
            $table->date('UltImport')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuImport')->unsigned()->default(0);
            $table->date('UltAtuaPre')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuAtuaPre')->unsigned()->default(0);
            $table->decimal('ImpPerImp', 5,2)->unsigned()->default("0.00");
            $table->decimal('ImpPerPis', 5,2)->unsigned()->default("0.00");
            $table->decimal('ImpPerCof', 5,2)->unsigned()->default("0.00");
            $table->decimal('ImpPerIcm', 5,2)->unsigned()->default("0.00");
            $table->mediumInteger('SeqSite')->unsigned();
            $table->date('DatViradaLoja')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuViradaLoja')->unsigned()->default(0);
            $table->date('DatViradaSite')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('UsuViradaSite')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabprodutos');
    }
};
