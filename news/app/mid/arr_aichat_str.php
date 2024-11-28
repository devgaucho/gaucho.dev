<?php
/**
 * Date: 29/10/2024
 * Time: 19:23
 */
return function($prompt){
	$len=mb_strlen($prompt['prompt']);
	if($len>$_ENV['AI_MAX_TOKENS']){
		return false;
	}
	$sleep=5;//segundos
	switch($prompt['model']){
		case 'claude3-haiku':
			$m='claude-3-haiku-20240307';
			break;
		case 'gpt4o-mini':
			$m='gpt-4o-mini';
			break;
		case 'llama3.1:70b':
			$m='meta-llama/Meta-Llama-3.1-70B-Instruct-Turbo';
			break;
		case 'mixtral0.1':
			$m='mistralai/Mixtral-8x7B-Instruct-v0.1';
			break;
		default:
			return false;
			break;
	}
	$url = 'https://duckduckgo.com/duckchat/v1/chat';
	$token=$this->mode('aichat_token_str');
	if(!$token){
		//reiniciar o tor
		$this->mid('service_restart','tor');
		sleep($sleep);
		return $this->mid('arr_aichat_str',$prompt);
	}
	$headers = array(
		"User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:124.0) Gecko/20100101 Firefox/124.0",
		"Accept: text/event-stream",
		"Accept-Language: en-US,en;q=0.5",
		"Accept-Encoding: gzip, deflate, br",
		"Referer: https://duckduckgo.com/",
		"Content-Type: application/json",
		"x-vqd-4: $token",
		"Origin: https://duckduckgo.com",
		"DNT: 1",
		"Sec-GPC: 1",
		"Connection: keep-alive",
		"Cookie: dcm=3",
		"Sec-Fetch-Dest: empty",
		"Sec-Fetch-Mode: cors",
		"Sec-Fetch-Site: same-origin",
		"Priority: u=4",
		"TE: trailers"
	);
	$data = array(
		'model' => $m,
		'messages' => [
			[
				'role' => 'user',
				'content' => $prompt['prompt']
			]
		]
	);
	$json_data = json_encode($data);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	if(
		isset($_ENV['PROXY'],$_ENV['PROXY_ATIVADO'])
		AND $_ENV['PROXY_ATIVADO']
	){
		curl_setopt($ch, CURLOPT_PROXY, $_ENV['PROXY']);
	}
	$response = curl_exec($ch);
	curl_close($ch);
	$result=$this->mode('str_aichat_decode_str',$response);
	if(empty($result)){
		//erro
		$arr=json_decode($response,true);
		if(
			isset($arr['status'])
			AND $arr['status']==429
		){
			//reiniciar o tor
			$this->mid('service_restart','tor');
			sleep($sleep);
			return $this->mid('arr_aichat_str',$prompt);
		}else{
			//die($response);
			return false;
		}
	}else{
		return $result;
	}
};
