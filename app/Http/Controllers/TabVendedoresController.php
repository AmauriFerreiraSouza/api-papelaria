<?php

namespace App\Http\Controllers;

use App\Models\Tabvendedores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TabVendedoresController extends Controller
{
    //Cria um Vendedor
    public function createSeller (Request $request) {
        $array = ['error' => ''];

        $rules = [
            'Situacao' => 'required|max:1',
            'Filial' => 'required|max:3',
            'Nome' => 'required|max:40',
            'Endereco' => 'required|max:40',
            'Bairro' => 'required|max:150',
            'Cidade' => 'required|max:20',
            'Estado' => 'required|max:2',
            'Cidade' => 'required|max:20',
            'Cep' => 'required|max:9',
            'Fone' => 'required|max:15',
            'Fax' => 'max:15',
            'Contato' => 'required|max:200',
            'FisJur' => 'required|max:1',
            'CgcCpf' => 'required|max:18',
            'InscRg' => 'required|max:18',
            'Tipo' => 'required|max:1',
            'Comissao' => 'required|',
            'GeraArq' => 'required|max:1',
            'Consumo' => 'required|max:1',
            'Canal' => 'required|max:3',
            'ShowRoom' => 'required|max:1',
            'Senha' => 'required',
            'Controle' => 'required|max:3'
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            $array['error'] = $validation->messages();
            return $array;
        }

        $Situacao = $request->input('Situacao');
        $Filial = $request->input('Filial');
        $Nome = $request->input('Nome');
        $Endereco = $request->input('Endereco');
        $Bairro = $request->input('Bairro');
        $Cidade = $request->input('Cidade');
        $Estado = $request->input('Estado');
        $Cidade = $request->input('Cidade');
        $Cep = $request->input('Cep');
        $Fone = $request->input('Fone');
        $Fax = $request->input('Fax');
        $Contato = $request->input('Contato');
        $FisJur = $request->input('FisJur');
        $CgcCpf = $request->input('CgcCpf');
        $InscRg = $request->input('InscRg');
        $Tipo = $request->input('Tipo');
        $Comissao = $request->input('Comissao');
        $GeraArq = $request->input('GeraArq');
        $Consumo = $request->input('Consumo');
        $Canal = $request->input('Canal');
        $ShowRoom = $request->input('ShowRoom');
        $Senha = $request->input('Senha');
        $Controle = $request->input('Controle');

        $seller = new Tabvendedores();
        $seller->Situacao = $Situacao;
        $seller->Filial = $Filial;
        $seller->Nome = $Nome;
        $seller->Endereco = $Endereco;
        $seller->Bairro = $Bairro;
        $seller->Cidade = $Cidade;
        $seller->Estado = $Estado;
        $seller->Cidade = $Cidade;
        $seller->Cep = $Cep;
        $seller->Fone = $Fone;
        $seller->Fax = $Fax;
        $seller->Contato = $Contato;
        $seller->FisJur = $FisJur;
        $seller->CgcCpf = $CgcCpf;
        $seller->InscRg = $InscRg;
        $seller->Tipo = $Tipo;
        $seller->Comissao = $Comissao;
        $seller->GeraArq = $GeraArq;
        $seller->Consumo = $Consumo;
        $seller->Canal = $Canal;
        $seller->ShowRoom = $ShowRoom;
        $seller->Senha = $Senha;
        $seller->Controle = $Controle;
        $seller->save();

        $user = new User();
        $user->Nome = $Nome;
        $user->Email = $Contato;
        $user->password = password_hash($Senha, PASSWORD_DEFAULT);
        $user->save();

        return $array;
    }

    //Lista todos o Vendedore
    public function listAllSellers () {
        $array = ['error' => ''];
        $sellers = Tabvendedores::simplePaginate(10);

        $array['list'] = $sellers->items();
        $array['current_page'] = $sellers->currentPage();
        return $array;
    }
}
