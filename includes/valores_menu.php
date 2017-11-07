<?php
  $menu = array();
  $menu['Home'] = array('index.php' , 'fa fa-home');
  $menu['Acerca Nuestro'] = array('acerca-nuestro.php', 'fa fa-info-circle');
  
  if(array_key_exists('logged', $_SESSION)){
		$menu['Men&uacute;'] = array('principal.php', 'fa fa-bars');
		$menu['Cerrar Sesi&oacute;n'] = array('includes/cerrar_sesion.php', 'fa fa-sign-out');
	}else{
  	$menu['Login'] = array('login.php', 'fa fa-sign-in');
	}
?>
