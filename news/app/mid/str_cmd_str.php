<?php
/**
 * Date: 08/11/2024
 * Time: 20:26
 */
return function($cmd){
	// Abre um manipulador de arquivo para read e write
	$descriptorspec=[
		//stdin é um pipe que o processo filho lê
		0=>["pipe","r"],
		//stdout é um pipe que o processo pai escreve
		1=>["pipe","w"],
		//stderr é um pipe que o processo pai escreve
		2=>["pipe","w"]
	];
	// Inicia o processo
	$process=proc_open($cmd,$descriptorspec,$pipes);
	if(is_resource($process)){
		// Fecha os pipes de entrada
		fclose($pipes[0]);
		// Lê a saída do processo
		$output=stream_get_contents($pipes[1]);
		fclose($pipes[1]);
		// Lê a saída de erro do processo
		$error=stream_get_contents($pipes[2]);
		fclose($pipes[2]);
		// captura o código de retorno
		$fileDescriptor=proc_close($process);
		$out=[
			'stdout' => $output,//stdout
			'stderr' => $error,//stderr
			//0 = default, 127 = not found
			'file_descriptor' => $fileDescriptor
		];
		if($out['file_descriptor']=='0'){
			return $output;
		}else{
			return false;
		}
	}else{
		return false;
	}
};