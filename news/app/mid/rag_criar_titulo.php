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
resuma esse texto em no máximo 8 palavras em português brasileiro

caso o texto faça referência a um país cite o nome do país

caso o texto faça referência a alguma figura governamental cite o cargo

<início do texto>
{$post}
</fim do texto>

verifique a ortografia e retorne apenas o resumo corrigido
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
