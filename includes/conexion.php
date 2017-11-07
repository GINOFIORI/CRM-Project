<?php
include_once('includes/datos_config.php');
$miConexion = mysqli_connect(MYSQL_SERVIDOR, MYSQL_USUARIO, MYSQL_CONTRASENA, MYSQL_BD, MYSQL_PUERTO);

if(!$miConexion){
	echo "La conexion a la base de datos fallo.";
	die();
}
?>