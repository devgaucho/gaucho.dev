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
hoje é {$hoje_epoch}

o texto em inglês abaixo é uma notícia em inglês:

<texto>
{$post}
</texto>

faça o seguinte:
1) resuma essa notícia em 3 parágrafos em português brasileiro
2) verifique se as datas dos 3 parágrafos são as mesmas da notícia
3) mencione neles detalhes de fatos inusitados da notícia
4) tente usar a tradução das palavras da notícia nos 3 parágrafos
5) cada um dos 3 parágrafos deverá ter no máximo 30 palavras
6) revise as siglas dos 3 parágrafos, tenha certeza que estão corretas
7) verifique a ortografia dos 3 parágrafos e corrija se necessário
8) verífique a concordância nominal de todas palavras dos 3 parágrafos
9) verifique se cada uma das palavras dos 3 parágrafos são válidas
10) não explique nada e nem enumere os 3 parágrafos
11) não explique as siglas nem as datas
12) caso a notícia cite algum país mantenha ele no resumo
13) não retorne nada além dos 3 parágrafos em plain-text

importante:
1) cada um dos 3 parágrafos deverá ter no máximo 30 palavras
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
