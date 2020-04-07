<?php
	
	include 'sql/login_db.php';
	global $mysqli;

	function sanitizeString($string) {

		// matriz de entrada
		$what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
		$by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','-','-','-','','','','','','','','','','','','','','','','','','','','' );

		// devolver a string
		return str_replace($what, $by, strtolower($string));
	}


	function slug_audio($titulo,$id){
		global $mysqli;

		$slug_audio_temp = sanitizeString($titulo);

		$query_slug = "SELECT * FROM `audio` WHERE (`slug` LIKE '{$slug_audio_temp}%')";
		if($id != ''){ $query_slug .= "AND ('id' != '{$id}')"; }

		$result = $mysqli->query($query_slug);
		$count_row = mysqli_num_rows($result);
		if($count_row > 0){
			$slug_audio = $slug_audio_temp.'-'.$count_row;
		}else{
			$slug_audio = $slug_audio_temp;
		}

		return $slug_audio;
	}


	$id = $_POST['id'];
	$titulo = $_POST['titulo'];
	$texto = $_POST['editordata'];

	$data = $_POST['data'];
	if($data == ''){
		$data = date('y-m-d');
	}else{
		$parts = explode("/", $data);
		$data = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
	}

	$slug_audio = slug_audio($_POST['titulo'],$id);

	$url = $_POST['url'];

	$assuntos = $_POST['assunto'];
	$assuntos = explode(",", $assuntos);
	//var_dump($assuntos);

	// IF delete assunto_audio
	$query_delete = "DELETE FROM `audio_assunto` WHERE `audio_assunto`.`audio` = '{$id}'";
	if ($mysqli->query($query_delete) === TRUE) {

		if($id == ''){
			// IF novo audio
			echo $query = "INSERT INTO `audio` (`id`,`titulo`,`texto`,`data`,`url`,`slug`) VALUES (NULL,'{$titulo}','{$texto}','{$data}','{$url}','{$slug_audio}')";
		}else{
			// IF atualiza audio
			echo $query = "UPDATE `audio` SET `titulo` = '{$titulo}', `texto` = '{$texto}', `data` = '{$data}', `url` = '{$url}', `slug` = '{$slug_audio}' WHERE `id` = {$id}";
		}


		if ($mysqli->query($query) === TRUE) {

			if($id == ''){
				$id = $mysqli->insert_id;
			}

			// IF atualiza assunto_audio
			foreach ($assuntos as $key => $value) {

				$titulo_assunto = $value;
				$slug = sanitizeString($titulo_assunto);
				$query_select_assunto = "SELECT * FROM `assunto` WHERE `slug` LIKE '{$slug}'";
				$result = $mysqli->query($query_select_assunto);
				//$row = mysqli_fetch_object($result);

				if(mysqli_num_rows($result)){
					foreach ($result as $key => $value) {
						$assunto_id = $value['id'];
						$query_insert_assunto = "INSERT INTO `audio_assunto` (`id`,`assunto`,`audio`) VALUES (NULL,{$assunto_id},{$id})";

						if ($mysqli->query($query_insert_assunto) === TRUE) {
							//echo '<br>OK<br>';

							$page = 'post';
							header("Location: {$page}.php"); 
						}
					}
				}else{
					//echo '<br>nao existe<br>';
					//echo $titulo_assunto;
					$query_new_assunto = "INSERT INTO `assunto` (`id`,`titulo`,`descricao`,`slug`) VALUES (NULL,'{$titulo_assunto}','','{$slug}')";

					if ($mysqli->query($query_new_assunto) === TRUE) {
						//echo '<br>inserida<br>';
						//echo $mysqli->insert_id.'<br>';

						$query_insert_assunto = "INSERT INTO `audio_assunto` (`id`,`assunto`,`audio`) VALUES (NULL,{$mysqli->insert_id},{$id})";

						if ($mysqli->query($query_insert_assunto) === TRUE) {
							//echo '<br>inserido relacionamento<br>';

							$page = 'post';
							header("Location: {$page}.php"); 
						}
					}
				}
			}


			



			//echo $id_assunto = $row[0]->id;
			//var_dump($assunto_id);

			/*if(mysqli_num_rows($result)){

				$result = $mysqli->query($query);
				while ($row = $result->fetch_object()){

					$assuntos[] = $row;

				}
			}*/


			//if ($mysqli->query($query) === TRUE) {

				//echo 'Áudio atualizado com sucesso!';
			//}

		}else{
			echo 'Desulpe, não foi possível atualizar/inserir o áudio.';			
		}

	}else{
		echo 'Desulpe, não foi possível atualizar os assuntos deste áudio.';
		
	}
	//$query_assuntos = "DELETE FROM `audio_assunto` 
	/*		INNER JOIN  
			ON `assunto`.`id` = `audio_assunto`.`assunto` 
					
			WHERE `audio_assunto`.`audio` = {$id} 

			ORDER BY `assunto`.`titulo` ASC";*/




	$mysqli->close();
?>