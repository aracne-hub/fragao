<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('cardapio', compact('categorias'));
    }
}
