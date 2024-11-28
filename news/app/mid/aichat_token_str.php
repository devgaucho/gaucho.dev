<?php
/**
 * Date: 29/10/2024
 * Time: 19:43
 */
return function(){
	$ch = curl_init('https://duckduckgo.com/duckchat/v1/status');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_NOBODY, false);
	if(
		isset($_ENV['PROXY'],$_ENV['PROXY_ATIVADO'])
		AND $_ENV['PROXY_ATIVADO']
	){
		curl_setopt($ch, CURLOPT_PROXY, $_ENV['PROXY']);
	}
	$headers = array(
		"User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:124.0) Gecko/20100101 Firefox/124.0",
		'Accept: */*',
		'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
		'Accept-Encoding: gzip, deflate, br, zstd',
		'Referer: https://duckduckgo.com/',
		'Cache-Control: no-store',
		'x-vqd-accept: 1',
		'Connection: keep-alive',
		'Cookie: dcm=5',
		'Sec-Fetch-Dest: empty',
		'Sec-Fetch-Mode: cors',
		'Sec-Fetch-Site: same-origin',
		'Priority: u=0',
		'TE: trailers'
	);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$response = curl_exec($ch);
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($response, 0, $header_size);
	$body = substr($response, $header_size);
	curl_close($ch);
	$response_array = array(
		'header' => $header,
		'body' => $body
	);
	$header=explode(PHP_EOL,$response_array['header']);
	foreach($header as $key=>$value){
		$arr=explode(': ',$value);
		if(@$arr[0]=='x-vqd-4'){
			return $arr[1];
		}
	}
//	print 'erro na obtenção do token vqd'.PHP_EOL;
//	die(var_dump($header));
	return false;
};
