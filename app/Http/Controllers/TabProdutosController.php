<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tabprodutos;

class TabProdutosController extends Controller
{

    //Cria um novo Produto
    public function createProduct (Request $request)
    {
        $array = ['error' => ''];

        $rules = [
            'CodProFor' => 'required|max:14',
            'Situacao' => 'required|max:255',
            'Descricao' => 'required|max:60',
            'DescriTec' => 'required',
            'DescriInMetro' => 'required|max:400',
            'DescriPublic' => 'required',
            'CodGru' => 'required|max:5',
            'SubGru' => 'required|max:5',
            'CodGru2' => 'required|max:8',
            'SubGru2' => 'required|max:8',
            'CodFab' => 'required|max:5',
            //
            'CodFor' => 'required|max:6',
            'CodDes' => 'required|max:5',
            'Curva' => 'required|max:1',
            'Comprador' => 'required|max:3',
            'IcmDif' => 'required|max:1',
            'FatSep' => 'required|max:1',
            'Proibe' => 'required|max:1',
            'AtuSite' => 'required|max:1',
            'PesoL' => 'required',
            'PesoB' => 'required',
            //
            'AtaPesoBru' => 'required',
            'AtaAltura' => 'required',
            'AtaLargura' => 'required',
            'AtaProfund' => 'required',
            'MstPesoBru' => 'required',
            'MstPesoLiq' => 'required',
            'MstAltura' => 'required',
            'MstLargura' => 'required',
            'MstProfund' => 'required',
            'UniPesoBru' => 'required',
            //
            'UniAltura' => 'required',
            'UniLargura' => 'required',
            'UniProfund' => 'required',
            'ClaFis' => 'required|max:15',
            'CodTrib' => 'required:max:255',
            'PerIpi' => 'required',
            'PerPis' => 'required',
            'PerCofins' => 'required',
            'DatLib' => 'nullable|date_format:Y-m-d',
            'PerCom' => 'required',
            //
            'Foto' => 'required|max:30',
            'Margem' => 'required',
            'MargMinCpr' => 'required',
            'IvaDentro' => 'required',
            'IvaFora' => 'required',
            'MargMin' => 'required',
            'CustoAnt' => 'required',
            'MedioAnt' => 'required',
            'PrecoNF' => 'required',
            'CusDolar' => 'required',
            //
            'PreDolar' => 'required',
            'CusMedio' => 'required',
            'PreLoj' => 'required',
            'PreRep' => 'required',
            'PreAtu' => 'required',
            'PreAnt' => 'required',
            'PreTrf' => 'required',
            'PreSC' => 'required',
            'PreSite' => 'required',
            'PrePromo' => 'required',
            //
            'VldPromo' => 'nullable',
            'BaseSTFor' => 'required',
            'ValorSTFor' => 'required',
            'MasterIni' => 'required|max:255',
            'MasterQtd' => 'required|max:5',
            'MasterFin' => 'required|max:255',
            'EmbIni' => 'required|max:255',
            'EmbQtd' => 'required|max:5',
            'EmbFin' => 'required|max:5',
            'Fator' => 'required|max:8',
            //
            'FatorCons' => 'required|max:5',
            'FatorCamp' => 'required|max:9',
            'CodBarMaster' => 'required|max:15',
            'CodBarMst' => 'required|max:15',
            'CodBarUnid' => 'required|max:15',
            'UltCpr' => 'nullable|date_format:Y-m-d',
            'QtdFornec' => 'required|max:5',
            'EmbInner' => 'required|max:5',
            'Desconto' => 'required',
            'DescQtd' => 'required|max:5',
            //
            'DescLimTelev' => 'required',
            'DescLimRepre' => 'required',
            'Imagem1' => 'required|max:12',
            'Imagem2' => 'required|max:12',
            'Imagem3' => 'required|max:12',
            'Imagem4' => 'required|max:12',
            'Controle' => 'required|max:3',
            'VendeMatriz' => 'required|max:255',
            'Mala' => 'required|max:255|nullable',
            'Apoio' => 'required|max:255',
            //
            'DatCad' => 'required|date_format:Y-m-d',
            'DatAlt' => 'required|date_format:Y-m-d',
            'UsuInc' => 'required|max:6',
            'UsuAlt' => 'required|max:6',
            'Home' => 'required|max:255',
            'Observ' => 'required|max:100',
            'Custo' => 'required',
            'DataDesativ' => 'nullable|date_format:Y-m-d',
            'UsuDesativ' => 'required|max:5',
            'MotProibe' => 'required|max:30',
            'DatProibe' => 'required|date_format:Y-m-d',
            'UsuProibe' => 'required|max:5',
            'Inventario' => 'required|max:255',
            'Consignado' => 'required|max:255',
            'CodCest' => 'required|max:7',
            'Classificacao' => 'required|max:3',
            'Sazonalidade' => 'required|max:3',
            'CodBrinde' => 'required|max:8',
            'QtdBrinde' => 'required|max:8',
            'UsuAltPre' => 'required|max:5',
            'VendaFil' => 'required|max:255',
            'UltImport' => 'nullable|date_format:Y-m-d',
            'UsuImport' => 'required|max:5',
            'UltAtuaPre' => 'nullable|date_format:Y-m-d',
            'UsuAtuaPre' => 'required|max:5',
            'ImpPerImp' => 'required',
            'ImpPerPis' => 'required',
            'ImpPerCof' => 'required',
            'ImpPerIcm' => 'required',
            'SeqSite' => 'required|max:8',
            'DatViradaLoja' => 'nullable|date_format:Y-m-d',
            'UsuViradaLoja' => 'required|max:5',
            'DatViradaSite' => 'nullable|date_format:Y-m-d',
            'UsuViradaSite' => 'required|max:5'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }
        //
        $CodProFor = $request->input('CodProFor');
        $Situacao = $request->input('Situacao');
        $Descricao = $request->input('Descricao');
        $DescriTec = $request->input('DescriTec');
        $DescriInMetro = $request->input('DescriInMetro');
        $DescriPublic = $request->input('DescriPublic');
        $CodGru = $request->input('CodGru');
        $SubGru = $request->input('SubGru');
        $CodGru2 = $request->input('CodGru2');
        $SubGru2 = $request->input('SubGru2');
        $CodFab = $request->input('CodFab');
        //
        $CodFor = $request->input('CodFor');
        $CodDes = $request->input('CodDes');
        $Curva = $request->input('Curva');
        $Comprador = $request->input('Comprador');
        $IcmDif = $request->input('IcmDif');
        $FatSep = $request->input('FatSep');
        $Proibe = $request->input('Proibe');
        $AtuSite = $request->input('AtuSite');
        $PesoL = $request->input('PesoL');
        $PesoB = $request->input('PesoB');
        //
        $AtaPesoBru = $request->input('AtaPesoBru');
        $AtaAltura = $request->input('AtaAltura');
        $AtaLargura = $request->input('AtaLargura');
        $AtaProfund = $request->input('AtaProfund');
        $MstPesoBru = $request->input('MstPesoBru');
        $MstPesoLiq = $request->input('MstPesoLiq');
        $MstAltura = $request->input('MstAltura');
        $MstLargura = $request->input('MstLargura');
        $MstProfund = $request->input('MstProfund');
        $UniPesoBru = $request->input('UniPesoBru');
        //
        $UniAltura = $request->input('UniAltura');
        $UniLargura = $request->input('UniLargura');
        $UniProfund = $request->input('UniProfund');
        $ClaFis = $request->input('ClaFis');
        $CodTrib = $request->input('CodTrib');
        $PerIpi = $request->input('PerIpi');
        $PerPis = $request->input('PerPis');
        $PerCofins = $request->input('PerCofins');
        $DatLib = $request->input('DatLib');
        $PerCom = $request->input('PerCom');
        //
        $Foto = $request->input('Foto');
        $Margem = $request->input('Margem');
        $MargMinCpr = $request->input('MargMinCpr');
        $IvaDentro = $request->input('IvaDentro');
        $IvaFora = $request->input('IvaFora');
        $MargMin = $request->input('MargMin');
        $CustoAnt = $request->input('CustoAnt');
        $MedioAnt = $request->input('MedioAnt');
        $PrecoNF = $request->input('PrecoNF');
        $CusDolar = $request->input('CusDolar');
        //
        $PreDolar = $request->input('PreDolar');
        $CusMedio = $request->input('CusMedio');
        $PreLoj = $request->input('PreLoj');
        $PreRep = $request->input('PreRep');
        $PreAtu = $request->input('PreAtu');
        $PreAnt = $request->input('PreAnt');
        $PreTrf = $request->input('PreTrf');
        $PreSC = $request->input('PreSC');
        $PreSite = $request->input('PreSite');
        $PrePromo = $request->input('PrePromo');
        //
        $VldPromo = $request->input('VldPromo');
        $BaseSTFor = $request->input('BaseSTFor');
        $ValorSTFor = $request->input('ValorSTFor');
        $MasterIni = $request->input('MasterIni');
        $MasterQtd = $request->input('MasterQtd');
        $MasterFin = $request->input('MasterFin');
        $EmbIni = $request->input('EmbIni');
        $EmbQtd = $request->input('EmbQtd');
        $EmbFin = $request->input('EmbFin');
        $Fator = $request->input('Fator');
        //
        $FatorCons = $request->input('FatorCons');
        $FatorCamp = $request->input('FatorCamp');
        $CodBarMaster = $request->input('CodBarMaster');
        $CodBarMst = $request->input('CodBarMst');
        $CodBarUnid = $request->input('CodBarUnid');
        $UltCpr = $request->input('UltCpr');
        $QtdFornec = $request->input('QtdFornec');
        $EmbInner = $request->input('EmbInner');
        $Desconto = $request->input('Desconto');
        $DescQtd = $request->input('DescQtd');
        //
        $DescLimTelev = $request->input('DescLimTelev');
        $DescLimRepre = $request->input('DescLimRepre');
        $Imagem1 = $request->input('Imagem1');
        $Imagem2 = $request->input('Imagem2');
        $Imagem3 = $request->input('Imagem3');
        $Imagem4 = $request->input('Imagem4');
        $Controle = $request->input('Controle');
        $VendeMatriz = $request->input('VendeMatriz');
        $Mala = $request->input('Mala');
        $Apoio = $request->input('Apoio');
        //
        $DatCad = $request->input('DatCad');
        $DatAlt = $request->input('DatAlt');
        $UsuInc = $request->input('UsuInc');
        $UsuAlt = $request->input('UsuAlt');
        $Home = $request->input('Home');
        $Observ = $request->input('Observ');
        $Custo = $request->input('Custo');
        $DataDesativ = $request->input('DataDesativ');
        $UsuDesativ = $request->input('UsuDesativ');
        $MotProibe = $request->input('MotProibe');
        //
        $DatProibe = $request->input('DatProibe');
        $UsuProibe = $request->input('UsuProibe');
        $Inventario = $request->input('Inventario');
        $Consignado = $request->input('Consignado');
        $CodCest = $request->input('CodCest');
        $Classificacao = $request->input('Classificacao');
        $Sazonalidade = $request->input('Sazonalidade');
        $CodBrinde = $request->input('CodBrinde');
        $QtdBrinde = $request->input('QtdBrinde');
        $UsuAltPre = $request->input('UsuAltPre');
        //
        $VendaFil = $request->input('VendaFil');
        $UltImport = $request->input('UltImport');
        $UsuImport = $request->input('UsuImport');
        $UltAtuaPre = $request->input('UltAtuaPre');
        $UsuAtuaPre = $request->input('UsuAtuaPre');
        $ImpPerImp = $request->input('ImpPerImp');
        $ImpPerPis = $request->input('ImpPerPis');
        $ImpPerCof = $request->input('ImpPerCof');
        $ImpPerIcm = $request->input('ImpPerIcm');
        $SeqSite = $request->input('SeqSite');
        $DatViradaLoja = $request->input('DatViradaLoja');
        $UsuViradaLoja = $request->input('UsuViradaLoja');
        $DatViradaSite = $request->input('DatViradaSite');
        $UsuViradaSite = $request->input('UsuViradaSite');

        $product = new Tabprodutos();
        $product->CodProFor = $CodProFor;
        $product->Situacao = $Situacao;
        $product->Descricao = $Descricao;
        $product->DescriTec = $DescriTec;
        $product->DescriInMetro = $DescriInMetro;
        $product->DescriPublic = $DescriPublic;
        $product->CodGru = $CodGru;
        $product->SubGru = $SubGru;
        $product->CodGru2 = $CodGru2;
        $product->SubGru2 = $SubGru2;
        $product->CodFab = $CodFab;
        //
        $product->CodFor = $CodFor;
        $product->CodDes = $CodDes;
        $product->Curva = $Curva;
        $product->Comprador = $Comprador;
        $product->IcmDif = $IcmDif;
        $product->FatSep = $FatSep;
        $product->Proibe = $Proibe;
        $product->AtuSite = $AtuSite;
        $product->PesoL = $PesoL;
        $product->PesoB = $PesoB;
        //
        $product->AtaPesoBru = $AtaPesoBru;
        $product->AtaAltura = $AtaAltura;
        $product->AtaLargura = $AtaLargura;
        $product->AtaProfund = $AtaProfund;
        $product->MstPesoBru = $MstPesoBru;
        $product->MstPesoLiq = $MstPesoLiq;
        $product->MstAltura = $MstAltura;
        $product->MstLargura = $MstLargura;
        $product->MstProfund = $MstProfund;
        $product->UniPesoBru = $UniPesoBru;
        //
        $product->UniAltura = $UniAltura;
        $product->UniLargura = $UniLargura;
        $product->UniProfund = $UniProfund;
        $product->ClaFis = $ClaFis;
        $product->CodTrib = $CodTrib;
        $product->PerIpi = $PerIpi;
        $product->PerPis = $PerPis;
        $product->PerCofins = $PerCofins;
        $product->DatLib = $DatLib;
        $product->PerCom = $PerCom;
        //
        $product->Foto = $Foto;
        $product->Margem = $Margem;
        $product->MargMinCpr = $MargMinCpr;
        $product->IvaDentro = $IvaDentro;
        $product->IvaFora = $IvaFora;
        $product->MargMin = $MargMin;
        $product->CustoAnt = $CustoAnt;
        $product->MedioAnt = $MedioAnt;
        $product->PrecoNF = $PrecoNF;
        $product->CusDolar = $CusDolar;
        //
        $product->PreDolar = $PreDolar;
        $product->CusMedio = $CusMedio;
        $product->PreLoj = $PreLoj;
        $product->PreRep = $PreRep;
        $product->PreAtu = $PreAtu;
        $product->PreAnt = $PreAnt;
        $product->PreTrf = $PreTrf;
        $product->PreSC = $PreSC;
        $product->PreSite = $PreSite;
        $product->PrePromo = $PrePromo;
        //
        $product->VldPromo = $VldPromo;
        $product->BaseSTFor = $BaseSTFor;
        $product->ValorSTFor = $ValorSTFor;
        $product->MasterIni = $MasterIni;
        $product->MasterQtd = $MasterQtd;
        $product->MasterFin = $MasterFin;
        $product->EmbIni = $EmbIni;
        $product->EmbQtd = $EmbQtd;
        $product->EmbFin = $EmbFin;
        $product->Fator = $Fator;
        //
        $product->FatorCons = $FatorCons;
        $product->FatorCamp = $FatorCamp;
        $product->CodBarMaster = $CodBarMaster;
        $product->CodBarMst = $CodBarMst;
        $product->CodBarUnid = $CodBarUnid;
        $product->UltCpr = $UltCpr;
        $product->QtdFornec = $QtdFornec;
        $product->EmbInner = $EmbInner;
        $product->Desconto = $Desconto;
        $product->DescQtd = $DescQtd;
        //
        $product->DescLimTelev = $DescLimTelev;
        $product->DescLimRepre = $DescLimRepre;
        $product->Imagem1 = $Imagem1;
        $product->Imagem2 = $Imagem2;
        $product->Imagem3 = $Imagem3;
        $product->Imagem4 = $Imagem4;
        $product->Controle = $Controle;
        $product->VendeMatriz = $VendeMatriz;
        $product->Mala = $Mala;
        $product->Apoio = $Apoio;
        //
        $product->DatCad = $DatCad;
        $product->DatAlt = $DatAlt;
        $product->UsuInc = $UsuInc;
        $product->UsuAlt = $UsuAlt;
        $product->Home = $Home;
        $product->Observ = $Observ;
        $product->Custo = $Custo;
        $product->DataDesativ = $DataDesativ;
        $product->UsuDesativ = $UsuDesativ;
        $product->MotProibe = $MotProibe;
        //
        $product->DatProibe = $DatProibe;
        $product->UsuProibe = $UsuProibe;
        $product->Inventario = $Inventario;
        $product->Consignado = $Consignado;
        $product->CodCest = $CodCest;
        $product->Classificacao = $Classificacao;
        $product->Sazonalidade = $Sazonalidade;
        $product->CodBrinde = $CodBrinde;
        $product->QtdBrinde = $QtdBrinde;
        $product->UsuAltPre = $UsuAltPre;
        //
        $product->VendaFil = $VendaFil;
        $product->UltImport = $UltImport;
        $product->UsuImport = $UsuImport;
        $product->UltAtuaPre = $UltAtuaPre;
        $product->UsuAtuaPre = $UsuAtuaPre;
        $product->ImpPerImp = $ImpPerImp;
        $product->ImpPerPis = $ImpPerPis;
        $product->ImpPerCof = $ImpPerCof;
        $product->ImpPerIcm = $ImpPerIcm;
        $product->SeqSite = $SeqSite;
        $product->DatViradaLoja = $DatViradaLoja;
        $product->UsuViradaLoja = $UsuViradaLoja;
        $product->DatViradaSite = $DatViradaSite;
        $product->UsuViradaSite = $UsuViradaSite;
        $product->save();

        return $product;
    }

    //Lista todos os Produtos
    public function allProduct ()
    {
        $array = ['error' => ''];

        $products = Tabprodutos::simplePaginate(2);

        $array['list'] = $products->items();
        $array['current_page'] = $products->currentPage();

        return $array;
    }
}
