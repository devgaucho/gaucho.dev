<?php
/**
 * Date: 08/11/2024
 * Time: 21:06
 */
return function($str){
	$str=trim($str);
	$str=escapeshellarg($str);
	$script=ROOT.'/app/node/tokens.js';
	$script=escapeshellarg($script);
	$cmd='echo "'.$str.'" | node '.$script.' 1';
	$out=$this->mode('str_cmd_str',$cmd);
	$out=trim($out);
	return json_decode($out,1);
};