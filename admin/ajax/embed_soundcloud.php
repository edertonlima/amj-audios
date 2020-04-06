<?php 

	if($_POST['url']){

		$url = $_POST['url'];

		$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
		$decodeiFrame=substr($getValues, 1, -2);
		$jsonObj = json_decode($decodeiFrame);

		echo str_replace('height="400"', 'height="166"', $jsonObj->html);

	}

?>