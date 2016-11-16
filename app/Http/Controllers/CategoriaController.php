<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function novo(Request $request){
        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->icone = $request->file('icone')->store('public/icones');
        if (!empty($request->fotol)){
            $categoria->fotol = $request->file('fotol')->store('public/fotol');
        }
        if (!empty($request->fotom)){
            $categoria->fotom = $request->file('fotom')->store('public/fotom');
        }
        if (!empty($request->fotos)){
            $categoria->fotos =  $request->file('fotos')->store('public/fotos');
        }

        $categoria->save();

        return back();
    }

    /**
     * @param Request $request
     * @param Categoria $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editar(Request $request, Categoria $categoria){
        $categoria->nome = $request->nome;
        if (!empty($request->icone)){
            $categoria->icone = $request->file('icone')->store('public/icones');
        }
        if (!empty($request->fotol)){
            $categoria->fotol = $request->file('fotol')->store('public/fotol');
        }
        if (!empty($request->fotom)){
            $categoria->fotom = $request->file('fotom')->store('public/fotom');
        }
        if (!empty($request->fotos)){
            $categoria->fotos = $request->file('fotos')->store('public/fotos');
        }

        $categoria->save();
        return back();
    }

    /**
     * @param Categoria $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletar(Categoria $categoria){
        $categoria->delete();
        return back();
    }
}
