<?php
/**
 * Date: 02/11/2024
 * Time: 01:04
 */
return function($prompt){
	switch($prompt['model']){
		case 'gemini1.5-flash:8b'://ruim, dá muito erro 503, gera parágrafos maiores que o solicitado e frases sem contexto
			$m='gemini-1.5-flash-8b';
			break;
		case 'gemini1.5-flash'://ruim, dá muito erro 503, gera parágrafos maiores que o solicitado (mais que o dobro)
			$m='gemini-1.5-flash';
			break;
		default:
			return false;
			break;
	}
	$url='https://generativelanguage.googleapis.com/v1beta/models/';
	$url.=$m.':generateContent?key='.$_ENV['GOOGLE_IA_TOKEN'];
	$data = [
		'contents' => [
			[
				'parts' => [
					['text' =>$prompt['prompt']]
				]
			]
		],
		'generationConfig'=>[
			'maxOutputTokens'=>$_ENV['AI_MAX_TOKENS'],
			"responseMimeType"=>"text/plain"
		],
		////https://ai.google.dev/api/generate-content?hl=pt-br#v1beta.HarmCategory
	];
	$headers = array(
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
	$candidate=@$arr["candidates"][0];
	sleep(4);//15 rpm no máximo
	if(
		isset(
			$candidate["finishReason"],
			$candidate['content']['parts'][0]['text']
		)
		AND $candidate["finishReason"]=='STOP'
	){
		return $candidate['content']['parts']['0']['text'];
	}else{
		if(isset($arr['error']['code']['503'])){
			sleep(5);
			return $this->mode(
				'arr_google_chat_str',
				$prompt
			);
		}else{
			if($_ENV['AI_DEBUG']){
				die(var_dump($arr));
			}
			return false;
		}
	}
};
