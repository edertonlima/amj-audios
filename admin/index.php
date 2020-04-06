<?php

	include 'config/head.php';

	if($_SESSION['login']){
		$page = 'post';

	}else{
		$page = 'login';
	}

	//include 'config/config.php';
	//include 'config/function.php';
	//include 'db/function_db.php';
	
	/*if( !isset($_SESSION["usuario_id"]) ) {
		
		// login
		$page = 'login';
		$template = '';

	}else{

		// admin
		$page = 'post';
		$template = '';

	}*/


	//include 'menu.php';
	//echo $page;
	//include $page . '.php';

	//include 'login.php';

	header("Location: {$page}.php"); 

?>