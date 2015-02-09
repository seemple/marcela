<?php
function apiFlickr($method,$extra_params) {
	
	$init_params = array(
		'method'	=> $method,
		'api_key'	=> "xxxxxxxxxxx",
		'format'	=> "php_serial"
	);
	
	$params = $init_params + $extra_params;
	
	$encoded_params = array();
	
	foreach ($params as $k => $v){
	
		$encoded_params[] = urlencode($k).'='.urlencode($v);
	}
	
	
	# llamar a la API y decodificar la respuesta
	#
	
	$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
	
	$rsp = file_get_contents($url);
	
	$rsp_obj = unserialize($rsp);
	
	return $rsp_obj;

}

// Albumes disponibles
$params = array("user_id"=>"130163679@N05");
$rsp = apiFlickr("flickr.photosets.getList",$params);
$photosets = $rsp["photosets"]["photoset"];

$album = array();

if ($rsp['stat'] == 'ok') {

// Array con Titulo y Fotos de cada album
	foreach ($photosets as $i => $v ) {
		$info["title"] = $v["title"]["_content"];
		$info["album_id"] = $v["id"];

		$params = array("photoset_id"=>"{$v['id']}");
		$fotos = apiFlickr("flickr.photosets.getPhotos",$params);

		foreach ($fotos["photoset"]["photo"] as $item) {
			$info["farm"] = $item["farm"];
			$info["secret"] = $item["secret"];
			$info["server"] = $item["server"];
			$info["id"] = $item["id"];
			$info["pic"] = "https://farm".$item["farm"].".staticflickr.com/".$item["server"]."/".$item["id"]."_".$item["secret"]."_s.jpg";
			array_push ($album,$info);
		}
		
	}
	
	echo "<pre>";
	print_r($album);
	echo "</pre>";
} else {
	print_r($rsp);	
}

?>