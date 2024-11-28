<?php
/**
 * Date: 01/11/2024
 * Time: 20:15
 */
use src\crud;
return function($post){
	$start=hrtime(true);
	$hoje_epoch=$this->mode('int_data_pt_str');
	$p=<<<heredoc
hoje é {$hoje_epoch}. dê um título para o texto com no máximo 8 palavras e revise a ortografia.
<início do texto>
{$post}
</fim do texto>
importante: não diga mais nada nada, apenas retorne o título sem aspas com no máximo 8 palavras nele.
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
		//salvar os metadados na tabela prompts
		$data=[
			'model'=>$m,
			'in'=>$p,
			'out'=>$out,
			'response_time'=>$totalSMs
		];
		$this->mode('arr_criar_prompt',$data);
		$out=trim($out);
		$out=trim($out,'-".\'');//remover aspas
	}
	$out=$this->mode('str_ucfirst_str',$out);
	$out=$this->mode('str_ptonly_str',$out);
	return $out;
};
