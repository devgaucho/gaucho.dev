<?php
/**
 * Date: 04/11/2024
 * Time: 20:30
 */
use src\crud;
return function($data){
	//salvar os metadados na tabela prompts
	$crud=new crud();
	$in_len=mb_strlen($data['in']);
	$out_len=mb_strlen($data['out']);
	$total_len=$in_len+$out_len;
	$tps=bcdiv($total_len,$data['response_time'],1);
	//llama3
	$l3_in=$this->mode('str_tokens_int',[$data['in'],1]);
	$l3_out=$this->mode('str_tokens_int',[$data['out'],0]);
	$l3_total=$l3_in+$l3_out;
	$l3_tps=bcdiv($l3_total,$data['response_time'],1);
	$data=[
		'created_at'=>time(),
		'model'=>$data['model'],
		'in_length'=>$in_len,
		'out_length'=>$out_len,
		'total_length'=>$total_len,
		'tps'=>$tps,
		'response_time'=>$data['response_time'],
		'provider'=>$_ENV['AI_PROVIDER'],
		//llama3
		'l3_in'=>$l3_in,
		'l3_out'=>$l3_out,
		'l3_total'=>$l3_total,
		'l3_tps'=>$l3_tps
	];
	$id=$crud->create("prompts",$data);
	if(!is_numeric($id)){
		die("erro ao criar prompt".PHP_EOL);
	}
};