<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarVeiculosController extends Controller
{
    public function __construct()
    {
        // Habilita as rotas somente após a autenticação
        $this->middleware('auth');
    }
   
    public function listarveiculos(){
        return view ('listarveiculos');
    }

}
