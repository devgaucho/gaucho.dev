<?php
/**
 * Date: 05/11/2024
 * Time: 20:36
 * https://fireworks.ai/dashboard/models/getting-started
 * https://fireworks.ai/models
 */
return function($prompt){
	switch($prompt['model']){
		case 'llama3.1:405b':
			$m='llama-v3p1-405b-instruct';
			break;
		case 'phi3-128k'://ruim pra sumarização e tradução (não traduz, gera títulos confusos)
			$m='phi-3-vision-128k-instruct';//3.8b
			break;
		default:
			return false;
			break;
	}
	$url = 'https://api.fireworks.ai/inference/v1/chat/completions';
	$model=$m;
	$headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
		'Authorization: Bearer '.$_ENV['FIREWORKS_AI_TOKEN']
	);
	$data = array(
		'model' => 'accounts/fireworks/models/'.$model,
		'max_tokens'=>(int) $_ENV['AI_MAX_TOKENS'],
		'temperature'=>0,
		'top_p'=>0,
		'top_k'=>1,
		'presence_penalty' => 0,
		'frequency_penalty' => 0,
		'messages' => array(
			[
				'role' => 'user',
				'content' => $prompt['prompt']
			]
		)
	);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$response = curl_exec($ch);
	curl_close($ch);
	$arr=json_decode($response,1);
	if(isset($arr['choices'][0]['message']['content'])){
		return $arr['choices'][0]['message']['content'];
	}else{
		return false;
	}
};