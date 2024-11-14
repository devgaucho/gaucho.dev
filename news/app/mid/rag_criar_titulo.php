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
hoje é {$hoje_epoch}

o texto abaixo é o resumo de uma notícia:

<texto>
{$post}
</texto>

faça o seguinte:
1) resuma esse texto em uma frase com no máximo 8 palavras
2) use apenas letras e números nessa frase
3) use apenas palavra em português brasileiro nessa frase
4) caso o texto fale sobre algum país inclua o nome do país na frase
5) revise a ortografia da frase
6) tente usar na frase palavras que constam no texto
7) verifique a a frase faz sentido
8) não explique nada
9) apenas retorne essa frase em plain-text e não diga mais nada
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
