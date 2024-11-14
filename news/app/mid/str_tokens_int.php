<?php
/**
 * Date: 08/11/2024
 * Time: 20:00
 * https://github.com/belladoreai/llama3-tokenizer-js
 */
return function($mix){
	$script=ROOT.'/app/node/tokens.js';
	if(is_array($mix) AND isset($mix[1])){
		$str=$mix[0];
		if($mix[1]){
			$str='<|start|><|user|>'.$str.'<|end|>';
			$script=ROOT.'/app/node/tokens_extra.js';
		}
	}elseif(is_string($mix)){
		$str=$mix;
	}else{
		return false;
	}
	$str=trim($str);
	$str=escapeshellarg($str);
	$script=escapeshellarg($script);
	$cmd="echo ".$str." | node ".$script.' 0';
	$out=$this->mode('str_cmd_str',$cmd);
	$out=trim($out);
	if(!is_numeric($out)){
		$out=0;
	}
	return intval($out);
};