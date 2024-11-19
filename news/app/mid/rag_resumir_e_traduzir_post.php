<?php
/**
 * Date: 01/11/2024
 * Time: 20:00
 */
use src\crud;
return function($post){
	$start=hrtime(true);
	$hoje_epoch=$this->mode('int_data_pt_str');
	$p=<<<heredoc
hoje é dia {$hoje_epoch}

Resuma a notícia abaixo em 3 parágrafos curtos (máximo 30 caracteres cada) em português brasileiro.Quando o texto tiver uma citação entre aspas, use as palavras entre aspas para gerar o resumo e não troque as palavras. Revise os 3 paragrafos para ter certeza que todas as palavras foram traduzidas corretamente para o português brasileiro. Não retorne mais nada além dos 3 parágrafos e não enumere os parágrafos.

<início do texto>
{$post}
</fim do texto>
heredoc;
	$m=$_ENV['AI_MODEL'];
	$data=[
		'model'=>$m,
		'prompt'=>$p
	];
	$out=$this->mode('arr_prompt_str',$data);
	$end=hrtime(true);
	$totalNs=$end-$start;
	$totalSMs=(($totalNs/1000)/1000)/1000;
	$totalSMs=number_format($totalSMs,3);//segundos.milisegundos
	if($out){
		$out=$this->mode('str_ptonly_str',$out);
		//salvar os metadados na tabela prompts
		$data=[
			'model'=>$m,
			'in'=>$p,
			'out'=>$out,
			'response_time'=>$totalSMs
		];
		$this->mode('arr_criar_prompt',$data);
	}
	return $out;
};
