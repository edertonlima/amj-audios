<?php
	
	session_start([
		'cookie_lifetime' => 86400
	]);

	include 'login_db.php';

	// conexão de banco
	function get_login($email,$senha){
		global $mysqli;

		$query = "SELECT * FROM `usuario` WHERE (`usuario_email` = '$email') AND (`usuario_senha` = '$senha')";
		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){
			//echo 'OK';

			$_SESSION['login'] = true;
			$_SESSION['id_usuario'] = '2';
			$_SESSION['nome_usuario'] = 'Ederton Lima';
			$_SESSION['login-msg'] = '';
			return true;

		}else{

			unset( $_SESSION );
			$_SESSION['login'] = false;
			$_SESSION['login-msg'] = 'Usuário ou senha inválida';
			return false;
		}

		//var_dump($row);

		$result->close();
		//mysqli_close($mysqli);
	}

	//get_login('edertton@gmail.com','M0needer!@');

?>