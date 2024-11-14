<?php
/**
 * Date: 04/11/2024
 * Time: 20:59
 */
return function($string){//retorna apenas caracteres do pt-br
	$caracteresPtBr = [
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
		'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
		'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
		'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
		'W', 'X', 'Y', 'Z',
		'à','á', 'é', 'í', 'ó', 'ú', 'â', 'ê', 'î', 'ô', 'û',
		'ã',
		'õ', 'ç', 'À',
		'Á', 'É', 'Í', 'Ó', 'Ú', 'Â', 'Ê', 'Î', 'Ô', 'Û', 'Ã',
		'Õ', 'Ç',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
		' ', '.', ',', ';', ':', '!', '?', '(', ')', '[', ']',
		'{', '}', '<', '>', '|', '\\', '/', '-', '_', '+',
		'=', '*', '#', '$', '%', '&', '@', '~', '^', '`',
		PHP_EOL
	];
	$resultado = '';
	$len=mb_strlen($string);
	$i=0;
	while($i<$len){
		$char=mb_substr($string,$i,1);
		if(in_array($char,$caracteresPtBr)){
			$resultado.=$char;
		}
		$i++;
	}
	return $resultado;
};