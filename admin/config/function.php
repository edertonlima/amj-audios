<?php
	
	// header
	function get_header(){
		include './include/header.php';
	}

	// footer
	function get_footer(){
		include './include/footer.php';
	}


	function the_field($ele = '',$ele2 = ''){ 
	}

	function get_home_url(){
		global $url_admin;
		return 'https://' . $url_admin;
	}
	
	function get_template_directory_uri(){
		global $url_admin;
		return 'https://' . $url_admin;
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

	// menu
	function the_menu(){

		echo 
			'<div class="box-sidebar cor1">' .
				'<h3>Menu</h3>' . 

				'<ul>';

		echo
				'</ul>' .
			'</div>';
	}
?>