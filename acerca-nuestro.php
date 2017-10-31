<?php

require_once('includes/valores_menu.php');
$activo = 'Inicio';
session_start();

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
    <script type="text/javascript">
    $(function() {
        $('#login-form-link').click(function(e) {
          $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });
      $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });

    });
    </script>
  </head>

  <body>

  <?php
  include_once('includes/menu_inicial.php')
  ?>

  <div id="main">
    <div class="content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="row">
            <div class="col-lg-12" >
              <div class="jumbotron text-center" style="background-color: transparent;">
                <h1>Company CRM</h1> 
                <p>This module allows your resources to manage the relationships with our company's customers. </p> 
                <p style="left; font-size: 12px"> Most likely in the future I'll update this area with more specifications and instructions about the product. For now, it's just text for filling this space. Write your e-mail for no reason on the following link.</p>
                <form class="form-inline">
                  <div class="input-group">
                    <input type="email" class="form-control" size="50" placeholder="Email Address" required>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-danger">Subscribe</button>
                    </div>
                  </div>
                </form>
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