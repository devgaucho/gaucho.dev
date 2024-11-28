<?php
/**
 * Date: 31/10/2024
 * Time: 18:50
 */
return function($url){
	$timeout=10;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	if(
		isset($_ENV['PROXY'],$_ENV['PROXY_ATIVADO'])
		AND $_ENV['PROXY_ATIVADO']
	){
		curl_setopt($ch, CURLOPT_PROXY,$_ENV['PROXY']);
	}
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$file = curl_exec($ch);
	if(curl_errno($ch)){
		curl_close($ch);
		return false;
	}
	curl_close($ch);
	return $file;
};