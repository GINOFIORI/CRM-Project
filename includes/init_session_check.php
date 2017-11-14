<?php
	session_start();
  	if(!array_key_exists('logged', $_SESSION)){
    	header('Location: login.php');
  	}

?>