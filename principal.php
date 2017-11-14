<?php
  require_once('includes/init_session_check.php');
  require_once('includes/valores_menu.php');
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

    <div class="content">
      <div class="row">
        <div style="overflow-x: hidden;">
          <div class="row">
            <div class="col-lg-12" >
              <div class="jumbotron text-center" style="background-color: transparent;">
                <div class="col-sm-6 col-md-4 col-lg-3" style="padding-bottom: 15px" >
                  <a href="clientes.php" class="btn btn-sq-xlg btn-primary">
                    <i class="fa fa-building-o fa-5x"></i><br/>
                    <br>Clientes
                  </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" style="padding-bottom: 15px" >
                  <a href="#" class="btn btn-sq-xlg btn-primary">
                    <i class="fa fa-user fa-5x"></i><br/>
                    <br>Contactos
                  </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" style="padding-bottom: 15px" >
                  <a href="#" class="btn btn-sq-xlg btn-primary">
                    <i class="fa fa-tasks fa-5x"></i><br/>
                    <br>Casos
                  </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" style="padding-bottom: 15px" >
                  <a href="#" class="btn btn-sq-xlg btn-primary">
                    <i class="fa fa-line-chart fa-5x"></i><br/>
                    <br>Reportes
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <script src="js/mostrar-ocultar-menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>

  </body>
</html>