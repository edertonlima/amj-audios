<?php
	
	session_start([
		'cookie_lifetime' => 86400
	]);

	include 'login_db.php';

	if(isset($_POST['action'])){
		if(!empty($_POST['action'])){

			//echo $_POST['id'];

			$_POST['action']($_POST['id']);

		}
	}

	// conexão de banco
	function get_login($email,$senha){
		global $mysqli;

		$query = "SELECT * FROM `usuario` WHERE (`email` = '$email') AND (`senha` = '$senha')";
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


	function get_post($query){
		global $mysqli;

		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$posts[] = $row;
				}

			return $posts;

		}else{


			return false;
		}

		$result->close();
	}


	function get_assunto($id){
		global $mysqli;

		$query = "SELECT `assunto`.`titulo`, `assunto`.`slug` FROM `assunto` 
			INNER JOIN audio_assunto 
			ON `assunto`.`id` = `audio_assunto`.`assunto` 
					
			WHERE `audio_assunto`.`audio` = {$id} 

			ORDER BY `assunto`.`titulo` ASC";


		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$assuntos[] = $row;

			}

			foreach ( $assuntos as $key => $assunto ) {
				echo strtolower($assunto->titulo);
				if (next( $assuntos )){
					echo ', ';
				}
			}
		}

		$result->close();
	}


	function the_assunto($id){
		global $mysqli;

		$query = "SELECT `assunto`.`titulo`, `assunto`.`slug` FROM `assunto` 
			INNER JOIN audio_assunto 
			ON `assunto`.`id` = `audio_assunto`.`assunto` 
					
			WHERE `audio_assunto`.`audio` = {$id} 

			ORDER BY `assunto`.`titulo` ASC";


		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$assuntos[] = $row;

			}

			foreach ( $assuntos as $key => $assunto ) {
				echo strtolower($assunto->titulo);
				if (next( $assuntos )){
					echo ', ';
				}
			}
		}

		$result->close();
	}


	function excluir_post($id){
		global $mysqli;

		$query = "DELETE FROM `audio` WHERE `audio`.`id` = '{$id}'";
		if ($mysqli->query($query) === TRUE) {
	
			$query_delete = "DELETE FROM `audio_assunto` WHERE `audio_assunto`.`audio` = '{$id}'";
			if ($mysqli->query($query_delete) === TRUE) {
				
			}
			
			echo 'ok';

		}else{
			echo 'Desulpe, não foi possível excluir o áudio.';
			
		}

		$mysqli->close();
	}


	function excluir_solicitacao($id){
		global $mysqli;

		$query = "DELETE FROM `solicitacoes` WHERE `solicitacoes`.`id` = '{$id}'";
		if ($mysqli->query($query) === TRUE) {
			
			echo 'ok';

		}else{
			echo 'Desulpe, não foi possível excluir a solicitacao.';
			
		}

		$mysqli->close();
	}


	function check_row_true($id){
		global $mysqli;

		$query = "UPDATE `solicitacoes` SET `status` = 1 WHERE `id` = '{$id}'";
		if ($mysqli->query($query) === TRUE) {
			
			echo 'ok';

		}else{
			echo 'Desulpe, não foi possível alterar a solicitacao.';
			
		}

		$mysqli->close();
	}


	function check_row_false($id){
		global $mysqli;

		$query = "UPDATE `solicitacoes` SET `status` = 0 WHERE `id` = '{$id}'";
		if ($mysqli->query($query) === TRUE) {
			
			echo 'ok';

		}else{
			echo 'Desulpe, não foi possível alterar a solicitacao.';
			
		}

		$mysqli->close();
	}

?>