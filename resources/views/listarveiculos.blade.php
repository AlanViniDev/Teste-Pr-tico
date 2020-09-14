@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Painel de controle</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
Você está logado!
</div>
</div> 
<div class = "card-body">
<!-- Formulario de veiculos -->
<h1 style = 'margin:10px;text-align:center;'>Seus Veículos</h1>
<?php

/* Essa variavel pega o usuario logado */
$UsuarioLogado = Auth::user()->name;

/* Da um select no meio da tabela users de acordo com o usuario que está logado */
$email = DB::select("SELECT email FROM users WHERE name = '".$UsuarioLogado."' ");
foreach($email as $email){
    $email =  $email->email;
}

/* Da um select no campo name da tabela users de acordo com o email do usuario logado */
$nome = DB::select("SELECT name FROM users WHERE email = '".$email."'  ");
foreach($nome as $nome){
    $nome =  $nome->name;
}

/* Da um select em todos os campos da tabela veículos de acordo com o nome do proprietário logado */
$veiculos = DB::select("SELECT * FROM veiculos WHERE proprietario = '".$nome."' ");

/* Lista os veículos do usuário logado */
foreach($veiculos as $veiculo){
    echo "<div id = 'veiculos' style = 'margin:50px;text-align:center;' >";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Proprietário(a)
    <input disabled value = '$veiculo->proprietario'></input> <br/>
    </span>
    ";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Renavam
    <input disabled value = '$veiculo->renavam'></input> <br/>
    </span>
    ";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Marca
    <input disabled value = '$veiculo->marca'></input> <br/>
    </span>
    ";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Modelo
    <input disabled value = '$veiculo->modelo'></input> <br/>
    </span>
    ";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Ano
    <input disabled value = '$veiculo->ano'></input> <br/>
    </span>
    ";
    echo "
    <span class='input-group-text' style = 'margin:10px;'> 
    Placa
    <input disabled value = '$veiculo->placa'></input> <br/>
    </span>
    ";
    echo "</div>";
}

?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection