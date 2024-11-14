<?php
/**
 * Date: 04/11/2024
 * Time: 23:16
 */
return function($timestamp=null,$mostrar_hora=true){
	// Obtém a data atual
	$dataAtual = new DateTime();
	if(is_null($timestamp)){
		$timestamp=time();
	}
	$dataAtual->setTimestamp($timestamp);

	// Formata a data
	$dia = $dataAtual->format('d');
	$mes = $dataAtual->format('F');
	$ano = $dataAtual->format('Y');
	$hora = $dataAtual->format('h'); // Formato de 12 horas
	$minuto = $dataAtual->format('i');
	$periodo = $dataAtual->format('A'); // AM ou PM

	// Array com os meses em português
	$mesesEmPortugues = [
		'January' => 'Janeiro',
		'February' => 'Fevereiro',
		'March' => 'Março',
		'April' => 'Abril',
		'May' => 'Maio',
		'June' => 'Junho',
		'July' => 'Julho',
		'August' => 'Agosto',
		'September' => 'Setembro',
		'October' => 'Outubro',
		'November' => 'Novembro',
		'December' => 'Dezembro'
	];

	// Substitui o mês em inglês pelo mês em português
	$mesPortugues = $mesesEmPortugues[$mes];

	// Imprime a data formatada
	$out="$dia de $mesPortugues de $ano";
	if($mostrar_hora){
		$out.=", $hora:$minuto $periodo";
	}
	return $out;
};