<?php

	$executionStartTime = microtime(true) / 1000;

	
		//$url = 'https://restcountries.eu/rest/v2/alpha/co';
	//$url = 'https://restcountries.eu/rest/v2/alpha/'.$_REQUEST['curr'];
	
	$url = 'https://openexchangerates.org/api/latest.json?app_id=b8afc90f163a4ba1b24e4246199dd7bf';
  
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result,true);	
	$output['status']['url'] = $url;
	//$output['status']['ext'] = $_REQUEST['currcodevalue'];
	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "mission saved";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = $decode;
	
	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($output); 

?>