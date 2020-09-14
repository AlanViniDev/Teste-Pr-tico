<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Models\ModelVeiculos;
use App\User;

/* Classe */

class AdminController extends Controller
{

    public $objUser;
    public $objVeiculos;
    public $email;

    /* Método construtor */
    public function __construct (){ 
        $this->objUser = new User();
        $this->objVeiculos = new ModelVeiculos();
    }

    /* Método responsavel por cadastrar os veículos */

    public function Store(Request $request){

        $cad = $this->objVeiculos->create([
            'proprietario' => $request->proprietario,
            'renavam' => $request->renavam,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'placa' => $request->placa,
        ]);
        $cad->save();
        
        /*
        Mail::send('emails.welcome', $data, function ($message) {
            $message->from('alan123vinicius@gmail.com', 'Laravel');
            $message->to('alan123vinicius@gmail.com')->cc('bar@example.com');
        });
        */
      
    }

    /* Realiza update na tabela veículos */
    public function Editar (Request $request, $id){
       
        $update = ModelVeiculos::findOrFail($id);

        $update->id = $request->id;
        $update->proprietario = $request->proprietario;
        $update->renavam = $request->renavam;
        $update->marca = $request->marca;
        $update->modelo = $request->modelo;
        $update->ano = $request->ano;
        $update->placa = $request->placa;

        $update->save();

    }

    /* Exclui na tabela veículos */
    public function Destroy($id){    
        /* Exclui o registro permanentemente */
        $delete = ModelVeiculos::findOrFail($id);
        $delete->forceDelete();
    }
}