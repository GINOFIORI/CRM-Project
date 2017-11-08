<?php
  require_once('includes/init_session.php');
  require_once('includes/valores_menu.php');
  require_once('includes/conexion.php');


  $select = "SELECT * FROM clientes";
  $result = mysqli_query($miConexion, $select);
  if(!$result) { 
    echo(mysql_error()); // TODO: better error handling
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
      <h2>Clientes</h2>      
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

  </body>
</html>