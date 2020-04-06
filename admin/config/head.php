<?php
	
	session_start([
		'cookie_lifetime' => 86400
	]);

	//include 'config.php';
	//include 'function.php';

	//$_SESSION["id_usuario"] = 12;
	//unset( $_SESSION );

	if(empty($_SESSION["id_usuario"])) :
		//echo "<script>alert('id_usuario = fazia');</script>";
		$_SESSION['login'] = false;	

		$page = 'login';
		header("Location: {$page}.php"); 

	else :
		//echo "<script>alert('id_usuario = " . $_SESSION["id_usuario"] . "');</script>";
		$_SESSION['login'] = true;

	endif;

	/*if( !isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]) ) :
		echo '<pre>Sessão OK</pre>'
	
	else :
		echo '<pre>Sem sessão</pre>'

	endif;

	//$_SESSION["id_usuario"] = 'Ederton';
	//$_SESSION["nome_usuario"] = 'edertton';

	// variaveis
	//$url_servidor = 'http://localhost:7880';
	//$home_url = '/pix90financeiro';

	/*if( !isset($_SESSION["usuario_id"]) ) :
		header("Location: preview/amj-audios/index.php"); 
		exit;
	
	endif;*/

?>