<?php
  require_once('includes/init_session_check.php');
  require_once('includes/valores_menu.php');
  require_once('includes/conexion.php');

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

  $select = "SELECT * FROM clientes";
  $result = mysqli_query($miConexion, $select);
  if(!$result){ 
    echo(mysql_error()); // TODO: better error handling
  }

?>