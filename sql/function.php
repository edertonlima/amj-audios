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


	function get_assunto($id=''){
		global $mysqli;

		if($id != ''){
			$query = "SELECT `assunto`.`titulo`, `assunto`.`slug` FROM `assunto` 
				INNER JOIN audio_assunto 
				ON `assunto`.`id` = `audio_assunto`.`assunto` 
						
				WHERE `audio_assunto`.`audio` = {$id} 

				ORDER BY `assunto`.`titulo` ASC";
		}else{
			$query = "SELECT * FROM `assunto` ORDER BY RAND()";
		}


		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$assuntos[] = $row;

			}

			/*foreach ( $assuntos as $key => $assunto ) {
				echo '<a href="javascript:">'.strtolower($assunto->titulo) . '</a> ';
			}*/
		}
 		
 		return $assuntos;
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


	function the_title_assunto_slug($slug){
		global $mysqli;

		//echo $query = "SELECT 'titulo' FROM `assunto` WHERE 'slug' = '{$slug}' ";
		$query = "SELECT * FROM `assunto` WHERE `slug` = '{$slug}'";

		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$assuntos[] = $row;

			}
		}

		$result->close();

		//var_dump($assuntos);

		echo $assuntos[0]->titulo;
		

	}

?>