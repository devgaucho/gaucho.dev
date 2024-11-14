<?php
/**
 * Date: 09/11/2024
 * Time: 20:51
 */
return function($arr){
	$str=json_encode($arr);
	$str=escapeshellarg($str);
	$script=ROOT.'/app/node/tokens2str.js';
	$script=escapeshellarg($script);
	$cmd="echo ".$str." | node ".$script;
	$out=$this->mode('str_cmd_str',$cmd);
	$out=trim($out);
	$out=trim($out,"'");
	return $out;
};