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
		return $url_base;
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
?>