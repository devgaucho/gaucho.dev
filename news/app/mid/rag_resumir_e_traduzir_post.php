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

resuma o texto abaixo em 3 parágrafos cada um com no máximo 30 palavras em português brasileiro

quando o texto tiver uma citação entre aspas usa as palavras entre aspas para gerar o resumo e não troque as palavras

não retorne mais nada além dos 3 parágrafos e não enumere os parágrafos

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
