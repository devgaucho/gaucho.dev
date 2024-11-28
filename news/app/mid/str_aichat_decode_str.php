<?php
/**
 * Date: 29/10/2024
 * Time: 19:54
 */
return function($str){
	$str=trim($str);
	$arr=explode(PHP_EOL,$str);
	$arr=array_filter($arr);
	$arr=array_values($arr);
	$fim=end($arr);
	$key=key($arr);
	if(
		$fim<>'data: [DONE]'
		//AND $fim<>'data: [DONE][LIMIT_ENTITY]'
	){
		return false;
	}else{
		unset($arr[$key]);
	}
	$out='';
	foreach($arr as $key=>$value){
		$json=explode('data: ',$value);
		if(isset($json[1])){
			$json=$json[1];
		}else{
			continue;
		}
		$out.=@json_decode($json,true)['message'];
	}
	return trim($out);
};