<?php
	
	include 'config.php';
	include 'function.php';
	//include 'db/function_db.php';

	if ($_GET) {
		$url = explode('/', $_GET['url']);
		$current_url =  $url_base.$_GET['url'];
		//var_dump($url);
		//var_dump(count($url));

		if(count($url) == 1){

			// category
			$page = 'category';
			$category = get_category($url[0]);
			$posts = get_posts($category->id);
			//var_dump($category);
			//var_dump($posts);

		}else{
			if(count($url) > 1){

				//if(count($code_post) > 1){
					
					// single
					$page = 'single';
					$template = 'single';		
					//$category = get_category($url[0]);
					//$posts = get_post($code_post[1]);
					//var_dump($posts);

				//}
			}
		}
	}else{

		// home
		$page = 'home';
		$template = 'page';

	}

	//var_dump($page);

?>


<?php
	//include 'menu.php';

	include $page . '.php';

?>