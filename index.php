<?php
  require_once('includes/init_session.php');
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
        <div class="col-md-6 col-md-offset-3">
          <div class="row">
            <div class="col-lg-12" >
              <div class="jumbotron text-center" style="background-color: transparent;">
                <h1><i class="fa fa-cogs fa-4x"></i></h1> 
                <h3><strong>Customer Relationship Managment Tool</strong></h3>
                <h5 style="text-align: right;"> Development by Gino Fiori <i class="fa fa-registered fa-1x"></i></h5>
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