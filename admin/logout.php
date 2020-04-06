<?php

	session_start();
	
	unset( $_SESSION );
	session_destroy(); 

	//var_dump($_SESSION);
	
	$page = 'login';
	header("Location: {$page}.php"); 

?>