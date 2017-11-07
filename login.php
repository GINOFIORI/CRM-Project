<?php
  require_once('includes/init_session.php');
  require_once('includes/valores_menu.php');
  require_once('includes/conexion.php');

  function comprobarCampo($nombreCampo) {
    $resultado = false;
    if( array_key_exists($nombreCampo, $_REQUEST) ){
      if( $_REQUEST[$nombreCampo] != '' ){
        $resultado = true;
      }
    }
    return $resultado;
  }

  function recuperarUsuarioCookie(){
    if(array_key_exists('recordar', $_COOKIE)) 
      return $_COOKIE['recordar'];
  }

  function imprimirAlerta () {
     return "<p><strong>El usuario o la contrase&ntilde;a son inv&aacute;lidos</strong></p>";
  }

  $seEnvioInfo = sizeof($_REQUEST) > 0;
  $formularioValido = false;
  $emailValido = true;
  $nombreApellidoValido = true;
  $contrasenaValido = true;

  if( $seEnvioInfo ) {

    $contrasenaValido = comprobarCampo('contrasena');
    $emailValido      = comprobarCampo('email');
    $recordar         = false;

    if(array_key_exists('recordar', $_REQUEST))
      $recordar = $_REQUEST['recordar'];

    $formularioValido = ( $emailValido AND $contrasenaValido );

    $email      = $_REQUEST['email'];
    $contrasena = $_REQUEST['contrasena'];
    $select     = "SELECT email, nombre, apellido, contrasena
                     FROM usuarios 
                    WHERE contrasena LIKE MD5('$contrasena') 
                      AND email LIKE '$email'";
    $query = mysqli_query($miConexion, $select);
    $fila  = mysqli_fetch_array($query);
    if(sizeof($fila) > 0){
      if($recordar == 'on'){
        setcookie('recordar',$email, strtotime("30 September 2018") );
      }else{
        setcookie('recordar','', 0 );
      }
      $formularioValido = true;
      session_start();
      $_SESSION['logged']   = true;
      $_SESSION['email']    = $email;
      $_SESSION['nombre']   = $fila[1];
      $_SESSION['apellido'] = $fila[2];
      header('Location: principal.php');
    }else{
      $formularioValido = false;
      $contrasenaValido = false;
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
          <form id="login-form" action="#" method="post" role="form" style="display: block;">
            <div class="panel panel-login">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <h2><i class="fa fa-user-circle-o fa-x2"></i>  LOGIN</h2>
                    <h3>
                    </h3>
                    <div class="form-group">
                      <input  type="text" 
                              name="email" 
                              id="email" 
                              tabindex="1" 
                              class="form-control" 
                              placeholder="E-mail" 
                              value="<?php echo recuperarUsuarioCookie(); ?>">
                    </div>
                    <div class="form-group">
                      <input  type="password" 
                              name="contrasena" 
                              id="contrasena" 
                              tabindex="2" 
                              class="form-control" 
                              placeholder="Contraseña">
                    </div>
                    <div class="col-xs-6 form-group pull-left checkbox">
                      <input  id="checkbox1" 
                              type="checkbox" 
                              name="recordar"> 
                      <label for="checkbox1">Recordar</label>   
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-12 tabs">
                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar Sesión">
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="alert alert-danger errores <?php echo (!$formularioValido && !$seEnvioInfo) ? "hide" : "";   ?>" 
               role="alert">
              <span class="error-email <?php echo ($emailValido && $seEnvioInfo) ? "hide" : "";?>">
                <?php echo imprimirAlerta(); ?>
              </span>
            <span class="error-contrasena <?php echo (!$contrasenaValido) ? "" : "hide";?>">
              <?php echo imprimirAlerta(); ?>
            </span>
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