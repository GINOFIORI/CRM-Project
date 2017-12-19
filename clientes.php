<?php

  require_once('model/recuperarClientes.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>

  <?php
  include_once('includes/menu_inicial.php')
  ?>
    
  <div id="main">

    <?php
    include_once('includes/nav_estado.php');
    ?>

    <div class="container-fluid" >
      <?php var_dump($_POST);
            var_dump($_REQUEST);
            var_dump($_GET); ?>
      <div class="col-sm-6">
        <h2 style="margin-top: 0px">Clientes</h2>     
      </div> 
      <div class="col-sm-6" style="text-align: right">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#agregarUsuario" title="Agregar cliente">
          <i class="fa fa-user-plus"></i>
        </button>
        <button type="button" class="btn btn-sm btn-primary">
          <i class="fa fa-user-times"></i>
        </button>
      </div>
      <!-- Modal para agregar clientes -->
      <div class="modal fade" id="agregarUsuario" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <form id="nuevoCliente"
                      action="clientes.php"
                      method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center">Nuevo Cliente</h4>
              </div>
              <div class="col-sm-12">
                <div class="form-area">  
                  <br style="clear:both">
                  <div class="form-group col-sm-8">
                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="cuit" name="cuit" placeholder="CUIT" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="email1" name="email1" placeholder="Email 1" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="email2" name="email2" placeholder="Email 2" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <textarea class="form-control" type="textarea" id="observaciones" name="observaciones" placeholder="Observaciones" maxlength="140" rows="7"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">Límite de caracteres alcanzado</p></span>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <div class="col-sm-12">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Agregar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>CUIT</th>
            <th>Email 1</th>
            <th>Email 2</th>
            <th>Domicilio</th>
            <th>Observaciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $row = 0;
          while ($fila = mysqli_fetch_array($result)) {
            echo '<tr style="cursor:default" id="row'.$fila['codigo'].'" class="unchecked">';
              echo '<td style="cursor:pointer" onClick="seleccionar('. $fila['codigo'] .')"><i class="fa fa-square-o" id="'. $fila['codigo'] .'"></i></td>';
              echo '<td style="cursor:">';
              echo $fila['nombre'];
              echo '</td>';
              echo '<td>';
              echo $fila['cuit'];
              echo '</td>';
              echo '<td>';
              echo $fila['email-1'];
              echo '</td>';
              echo '<td>';
              echo $fila['email-2'];
              echo '</td>';
              echo '<td>';
              echo $fila['domicilio'];
              echo '</td>';
              echo '<td>';
              echo $fila['observaciones'];
              echo '</td>';
            echo '</tr>';          
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="js/mostrar-ocultar-menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){ 
      $('#characterLeft').text('140 caracteres restantes');
      $('#observaciones').keydown(function () {
          var max = 140;
          var len = $(this).val().length;
          if (len >= max) {
              $('#characterLeft').text('Límite de caracteres alcanzado');
              $('#characterLeft').addClass('red');
              $('#btnSubmit').addClass('disabled');            
          } 
          else {
              var ch = max - len;
              $('#characterLeft').text(ch + ' caracteres restantes');
              $('#btnSubmit').removeClass('disabled');
              $('#characterLeft').removeClass('red');            
          }
      });    
  });
  </script>

  <script type="text/javascript">
    function seleccionar(fila){
      if ($('#row'+fila).attr("class") == "unchecked"){
        $('#'+fila).removeClass("fa fa-square-o").addClass("fa fa-check-square-o");
        $('#row'+fila).attr("class", "checked");
      }else{
        $('#'+fila).removeClass("fa fa-check-square-o").addClass("fa fa-square-o");
        $('#row'+fila).attr("class", "unchecked")
      }
    }
  </script>

  </body>
</html>