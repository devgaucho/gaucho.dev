<?php
/**
 * Date: 01/11/2024
 * Time: 20:00
 */
use src\crud;
return function($post){
	//traduzir
	$start=hrtime(true);
	$hoje_epoch=$this->mode('int_data_pt_str');
	$p=<<<heredoc
traduza o texto para português brasileiro e revise a ortografia.
<início do texto>
{$post}
</fim do texto>
importante: não diga mais nada nada, apenas retorne a tradução.
heredoc;
	$p=trim($p);
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
	$tradução=$out;
	//resumir
	$start=hrtime(true);
	$hoje_epoch=$this->mode('int_data_pt_str');
	$p=<<<heredoc
hoje é {$hoje_epoch}. resuma o texto em 3 parágrafos cada um com no máximo 30 palavras cada parágrafo. revise a ortografia após resumir.
<início do texto>
{$tradução}
</fim do texto>
importante: não explique e nem enumere os 3 parágrafos, apenas retorne os 3 parágrafos com no máximo 30 palavras em cada um e não diga mais nada.

heredoc;
	$p=trim($p);
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
	//fix 4 parágrafos
	$arr=explode(PHP_EOL,$out);
	if(count($arr)==4){
		unset($arr[0]);
	}
	$out=implode(PHP_EOL,$arr);
	return $out;
};
