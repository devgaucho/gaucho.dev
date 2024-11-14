<?php
/**
 * Date: 05/11/2024
 * Time: 20:50
 */
return function($data){
	if(str_starts_with($data['model'],'gemini')) {
		$out = $this->mode('arr_google_chat_str', $data);
	}elseif(
		$data['model']=='llama3.1:405b'
		OR str_starts_with($data['model'],'phi3')
	){
		$out=$this->mode('arr_fireworks_chat_str',$data);
	}else{
		$out=$this->mode('arr_cf_chat_str',$data);
	}
	return $out;
};