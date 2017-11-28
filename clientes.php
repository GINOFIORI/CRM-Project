<?php
  require_once('includes/init_session_check.php');
  require_once('includes/valores_menu.php');
  require_once('includes/conexion.php');

  $select = "SELECT * FROM clientes";
  $result = mysqli_query($miConexion, $select);
  if(!$result){ 
    echo(mysql_error()); // TODO: better error handling
  }

  if (array_key_exists('submit', $_REQUEST)){

    $nombreCliente = $_REQUEST['nombreCliente'];
    $cuit          = $_REQUEST['cuit'];
    $email1        = $_REQUEST['email1'];
    $email2        = $_REQUEST['email2'];
    $domicilio     = $_REQUEST['domicilio'];
    $observaciones = $_REQUEST['observaciones'];

    $query2 = mysqli_query($miConexion, 'SELECT MAX(codigo) AS codigo FROM clientes');
    $latest = mysqli_fetch_array($query2);
    $codCliente = $latest['codigo'] + 1;

    $insert = "INSERT INTO `crm_client`.`clientes`(`codigo`, `nombre`, `cuit`, `email-1`, `email-2`, `domicilio`, `observaciones`) 
               VALUES ( '$codCliente' , '$nombreCliente', '$cuit' , '$email1' , '$email2', '$domicilio', '$observaciones')";


    $resultInsert = mysqli_query($miConexion, $insert);
    if(!$resultInsert){ 
      echo(mysql_error()); // TODO: better error handling
    }

  }

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
          <div class="modal-content">
            <form id="nuevoCliente"
                        action="clientes.php"
                        method="POST">
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
            </form>
          </div>
        </div>
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
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
          while ($fila = mysqli_fetch_array($result)) {
            echo "<tr class='clickable-row'>";
              echo '<td style="cursor:pointer">';
              echo $fila['nombre'];
              echo '</td>';
              echo '<td style="cursor:pointer">';
              echo $fila['cuit'];
              echo '</td>';
              echo '<td style="cursor:pointer">';
              echo $fila['email-1'];
              echo '</td>';
              echo '<td style="cursor:pointer">';
              echo $fila['email-2'];
              echo '</td>';
              echo '<td style="cursor:pointer">';
              echo $fila['domicilio'];
              echo '</td>';
              echo '<td style="cursor:pointer">';
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

  </body>
</html>