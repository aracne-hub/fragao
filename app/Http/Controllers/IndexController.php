<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('cardapio', compact('categorias'));
    }

    public function admin(){
        $categorias = Categoria::all();
        if (Auth::check())
            return view('admin', compact('categorias'));
        return view('cardapio', compact('categorias'));
    }
}
