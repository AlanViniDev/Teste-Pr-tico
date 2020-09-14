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

            <h1>Veículo</h1>
         
            <form method = "POST" action = "" id = "veiculos" name = "FormularioVeiculos" class="needs-validation form-control">
            @csrf

            <div class="form-row">
            
            <div class="col-md-4 mb-3">
            <label for="validationCustom01">Nome do proprietário</label>
            <input type="text" class="form-control" id="proprietario" placeholder="" value="" name = "proprietario" required>
            </div>

            <div class="col-md-4 mb-3">
            <label for="validationCustom02">Renavam do veículo</label>
            <input type="text" class="form-control" id="renavam" placeholder="" value="" name = "renavam" required>
            </div>

            <div class="col-md-4 mb-3">
            <label for="validationCustom01">Marca do veículo</label>
            <input type="text" class="form-control" id="marca" placeholder="" value="" name = "marca" required>
            </div>

            </div>

            <div class = "form-row">
            <div class="col-md-4 mb-3">
            <label for="validationCustom02">Modelo do veículo</label>
            <input type="text" class="form-control" id="modelo" placeholder="" value="" name = "modelo" required>
            </div>
        
            <div class="col-md-4 mb-3">
            <label for="validationCustom01">Ano do veículo</label>
            <input type="text" class="form-control" id="ano" placeholder="" minlength = "4" maxlength = "4" value="" name = "ano" required>
            </div>

            <div class="col-md-4 mb-3">
            <label for="validationCustom05">Placa do veículo</label>
            <input type="text" class="form-control" id="placa" placeholder="" value="" minlength = "7" maxlength = "7" name = "placa" required>
            </div>

            </div>

          
            <div class="form-row row d-flex justify-content-center" >
       
            <div class="col-md-3">
            <button class=" btn-lg btn-block  btn-primary" style = "cursor:pointer;margin:2px;" type="submit">Cadastrar</button>
            </div>
           
            <div class="col-md-3">
            <button class=" btn-lg btn-block  btn-warning" style = "cursor:pointer;color:white;margin:2px;"
            data-toggle="modal" data-target=".bd-example-modal-lg" id = "ListarVeiculos"
             type="button">Vizualizar</button>
            </div>
           
            <div class="col-md-3">
            <button class=" btn-lg btn-block  btn-success" style = "cursor:pointer;margin:2px;" type="button"
            onclick = 'atualizar();'>Atualizar</button>
            </div>

            </div>
            </form>
            </div>
        </div>
    </div>   
</div>
@include('layouts.modalsuccess')
@include('layouts.modalcadastros')
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Chama a rota que realiza o cadastro -->
<script type = "text/javascript">
$(function (){
    $('form[name="FormularioVeiculos"]').submit(function (event){
        event.preventDefault();
        $('#exampleModal').modal('show');
        $.ajax({
            url: "{{url('AdicionarVeiculos')}}",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data){   
            }
        });
    });
});
</script>

<!-- atualiza a página -->
<script type = "text/javascript">
function atualizar(){
    location.replace("home");
}
</script>