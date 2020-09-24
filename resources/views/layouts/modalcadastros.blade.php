<!-- Vizualizar clientes cadastrados -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" id = "modalcadastros" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <h1 style = "text-align:center;color:blue;font-weight:bolder;position:relative;
      top:35px;">Veículos Cadastrados</h1>
       <?php
       /* Lista todos os veiculos cadastrados */
         $tables = DB::select("SELECT * FROM veiculos order by id ASC ");
         if(empty($tables))
         {
          echo "<p style = 'text-align:center;font-family:Arial;
          font-size:20px;font-weight:bolder;
          color:black;position:relative;top:20px;'>Não há veículos cadastrados</p>";
         }
        foreach($tables as $table)
        {     
          echo "<div style = 'font-family:Arial;color:black;font-weight:bolder;'>";
          
              echo "<div style = 'position:relative;top:50px;'>";
              echo "<input id = 'id' value = '$table->id' style = 'width:30px;'>" . ' ';
              echo "Proprietario: " . $table->proprietario . ", ";
              echo "Renavam: " . $table->renavam . ", ";
              echo "Marca: " . $table->marca . ", ";
              echo "Modelo: " . $table->modelo . ", ";
              echo "Ano: " . $table->ano . ", ";
              echo "Placa: " . $table->placa . ", ";
              echo "Criado em: " . $table->created_at . ", ";
              echo "Atualizado em: " . $table->updated_at . " ";
              echo "</div>";

              echo "<br/>";
              echo "<br/>";

               echo "
              <div class = 'form-row row d-flex float-right '>
              <button  type='button' class='btn-secondary btn-lg' data-dismiss='modal'
              style = 'cursor:pointer;margin:10px;'
              >Fechar</button>
              <a class='btn-success btn-lg ' style = 'cursor:pointer;margin:10px;' type='submit'
              href = '../.././public/index.php/editar?$table->id' target='_blank' 
              >Editar</a>
              
              <button class='btn-danger btn-lg ' style = 'cursor:pointer;margin:10px;' id = 'excluir' type = 'submit' 
              onclick = 'Excluir($table->id);'
              >Excluir</button>
              </div>
              ";
              echo "</div>";
              
            }
       ?>
       <script type = "text/javascript">
       </script>
    </div>
  </div>
</div>
@include('layouts.modalsuccess')
<!-- chama a rota que exclui o veículo -->
<script type = "text/javascript">
function Excluir (param)
{
  id = param;
    $.ajax({
      url: "ExcluirVeiculos/destroy/"+id,
      type: "GET",
      success: function(data){
      $('#exampleModal').modal('show');
    }});
}
</script>
