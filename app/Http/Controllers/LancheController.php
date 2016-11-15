<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Lanche;
use Illuminate\Http\Request;

class LancheController extends Controller
{
    public function novo(Request $request, Categoria $categoria){
        $lanche = new Lanche;
        $lanche->nome = $request->nome;
        $lanche->preco = number_format(str_replace(',', '.', $request->preco), 2, '.', '');
        $lanche->ingredientes = $request->ingredientes;

        $categoria->lanches()->save($lanche);

        return back();
    }

    public function editar(Request $request, Lanche $lanche){
        $lanche->nome = $request->nome;
        $lanche->preco = number_format(str_replace(',', '.', $request->preco), 2, '.', '');
        $lanche->ingredientes = $request->ingredientes;
        $lanche->save();
        return back();
    }

    public function deletar(Lanche $lanche){
        $lanche->delete();
        return back();
    }
}
