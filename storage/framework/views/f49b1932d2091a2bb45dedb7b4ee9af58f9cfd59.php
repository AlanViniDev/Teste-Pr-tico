<?php $__env->startSection('content'); ?>
      <?php
       /* Capturar o id do registro pela url */
       $url = $_SERVER["REQUEST_URI"];

       for($i = 36; $i <= 38; $i++){
         $aux[$i] = $url[$i];
       }
  
       @$id = implode($aux);
 
       /* da um select em todos os veiculos cadastrados */
       
       $tables = DB::select("SELECT * FROM veiculos where id = $id ");

       ?>

      <!-- formulario para editar a tabela veículos -->

      <h1 style = "font-weight:bolder;font-size:23px;font-family:Arial;
      text-align:center;margin-bottom: .5rem;font-family: inherit;font-weight: 600;line-height: 1.2;color: inherit;"> Editar Veículo </h1>
       <form action = '' method = 'POST' name = 'EditarVeiculos' style = "text-align:center;">
       <?php echo csrf_field(); ?>
      <?php
      foreach($tables as $table)
      {     
        echo "<input style = 'margin:10px;' required id = 'id' type = 'text' placeholder = 'ID' name = 'id' value = '$table->id'/> " . "<br/>";
        echo "<input style = 'margin:10px;' required type = 'text' placeholder = 'Proprietario' name = 'proprietario' value = '$table->proprietario'/> " . "<br/>";
        echo "<input style = 'margin:10px;' required type = 'text' placeholder = 'Renavam' name = 'renavam' value = '$table->renavam'/> " . "<br/>";
        echo "<input style = 'margin:10px;' required type = 'text' placeholder = 'Marca' name = 'marca' value = '$table->marca'/> " . "<br/>";
        echo "<input style = 'margin:10px;' required type = 'text' placeholder = 'Modelo' name = 'modelo' value = '$table->modelo'/> " . "<br/>";
        echo "<input style = 'margin:10px;' minlength = '4' maxlength = '4' required type = 'text' placeholder = 'Ano' name = 'ano' value = '$table->ano'/> " . "<br/>";
        echo "<input style = 'margin:10px;' minlength = '7' maxlength = '7' required type = 'text' placeholder = 'Placa' name = 'placa' value = '$table->placa'/> " . "<br/>";
        echo "<br/>";
      } 
      echo "
      <div class='modal-footer form-row row d-flex justify-content-center'>
      <button  class='btn btn-lg  btn-success' type = 'submit' id = 'editar'
      style = ''>Confirmar</button>

      <div class='modal-footer form-row row d-flex justify-content-center'>
      <button  class='btn btn-lg  btn-primary' type = 'button' id = 'editar' onclick = 'atualizar();'
      style = ''>Atualizar</button>

      </div>
      </form>";
      ?>
  
  <?php echo $__env->make('layouts.modalcadastros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('layouts.modalsuccess', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- chama a rota que edita o veiculo cadastrado -->

<script type = "text/javascript">
$(function (){
    $('form[name="EditarVeiculos"]').submit(function (event){
        event.preventDefault();
        $('#exampleModal').modal('show');
        $.ajax({
            url: "EditarVeiculos/editar/"+id,
            type: "POST",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data){   
              alert(data);  
            }
        });
    });
});
</script>

<!-- atualiza a página -->
<script type = "text/javascript">
function atualizar(){
    location.replace("editar?"+id);
}
</script>

<style>
input{
  width:300px;
  border-color:#87CEFA;
  border-width:1px;
  border-radius:5px;
  height:35px;
}

body{
  overflow:hidden;
}
</style>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>