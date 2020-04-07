<?php
	
	// header
	function get_header(){
		include 'header.php';
	}

	// footer
	function get_footer(){
		include 'footer.php';
	}


	function the_field($ele = '',$ele2 = ''){
	}

	function get_home_url(){
		global $url_base;
		return $url_base;
	}
	
	function get_template_directory_uri(){
		global $url_base;
		return 'https://' . $url_base;
	}


	// head padrão
	function wp_head($ele = '',$ele2 = ''){

	}

	// footer padrão
	function wp_footer(){

	}

	// classes
	function body_class(){
		global $page, $template;
		$class = $page . ' ' . $template;
		echo 'class="' . $class . '"';
	}


	// formato data
	function the_data($data){
		//$data = date_create($data);
		//echo $data->format('d \d\e F,Y');
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		echo ucfirst( utf8_encode( strftime("%d de %B, %Y", strtotime($data) ) ) );
	}


	// resumo
	function the_resumo($texto){
		if(strlen($texto) > 160){

			$texto = strip_tags($texto);
			echo substr($texto,0,180) . ' [...]';

		}else{
			echo $texto;
		}
	}


	// link post
	function the_link($id,$slug){
		
		global $mysqli;

		$query = "SELECT `assunto`.`slug` FROM `assunto` 
			INNER JOIN audio_assunto 
			ON `assunto`.`id` = `audio_assunto`.`assunto` 
					
			WHERE `audio_assunto`.`audio` = {$id} 

			ORDER BY `audio_assunto`.`id` ASC LIMIT 1";


		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);

		if(mysqli_num_rows($result)){

			$result = $mysqli->query($query);
			while ($row = $result->fetch_object()){

				$assuntos[] = $row;

			}
		}

		$result->close();

		echo 'https://' . get_home_url() . '/' . $assuntos[0]->slug . '/' . $slug;
	}


	// link assunto
	function the_link_assunto($slug){
		echo 'https://' . get_home_url() . '/' . $slug;
	}
?>