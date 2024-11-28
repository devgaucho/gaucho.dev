<?php
/**
 * Date: 01/11/2024
 * Time: 20:45
 * https://playground.ai.cloudflare.com/
 * https://developers.cloudflare.com/workers-ai/models/
 */
return function($prompt){
	switch($prompt['model']){
		case 'llama3.2:1b':
			//não presta pra sumarização
			$m='@cf/meta/llama-3.2-1b-instruct';
			break;
		case 'llama3.2:3b':
			//não presta pra sumarização nem tradução
			$m='@cf/meta/llama-3.2-3b-instruct';
			break;
		case 'llama3.1:8b':
			//ruim pra sumarização e tradução (Bamalá Harris)
			$m='@cf/meta/llama-3.1-8b-instruct';
			break;
		case 'llama3.1:8b-fast':
			$m='@cf/meta/llama-3.1-8b-instruct-fast';
			break;
		case 'llama3.1:8b-q4':
			$m='@cf/meta/llama-3.1-8b-instruct-awq';
			break;
		case 'llama3.2:11b':
			$m='@cf/meta/llama-3.2-1b-instruct';
			break;
		case 'llama3.1:70b':
			$m='@cf/meta/llama-3.1-70b-instruct';
			break;
		case 'llama3.2:11b-vision'://ruim pra sumarização e tradução (falha em gerar títulos)
			$m='@cf/meta/llama-3.2-11b-vision-instruct';
			break;
		default:
			return false;
			break;
	}
	$url = 'https://api.cloudflare.com/client/v4/accounts/';
	$url.=$_ENV['CF_ACCOUNT'].'/ai/run/'.$m;
	$data=[
		'stream'=>false,
		'max_tokens'=>(int) $_ENV['AI_MAX_TOKENS'],
		'temperature'=>(int) 0,
		'top_p'=>(int) 1,
		'top_k'=>(int) 1,
		'seed'=>(int) 1,
		'presence_penalty' =>(int) 0,
		'frequency_penalty' =>(int) 0,
		'messages'=>[
			[
				'role'=>"user",
				'content'=>$prompt['prompt']
			]
		]
	];
	$headers = array(
		'Authorization: Bearer '.$_ENV['CF_TOKEN'],
		'Content-Type: application/json'
	);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$response = curl_exec($ch);
	curl_close($ch);
	$arr=json_decode($response,true);
	if($arr['success'] AND isset($arr['result']['response'])){
		return $arr['result']['response'];
	}else{
		if($_ENV['AI_DEBUG']){
			die(var_dump($arr));
		}
		die(var_dump($arr));
		return false;
	}
};
