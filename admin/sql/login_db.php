<?php

	$sql_servidor = 'localhost';
	$usuario = 'edertton_amj';
	$senha = 'I2_SkLvIoITc';
	$db = 'edertton_amj-audios';

	/*echo $sql_servidor;
	echo '<br>'.$usuario;
	echo '<br>'.$senha;
	echo '<br>'.$db;*/
	
	$mysqli = new mysqli($sql_servidor, $usuario, $senha, $db);
	$mysqli->set_charset("utf8");

	// Check connection
	if ($mysqli->connect_error) {	
		die("Connection failed: " . $mysqli->connect_error);
	}
	//echo '<br>Conectado<br><br>';

?>