<?php
/**
 * Date: 29/10/2024
 * Time: 21:00
 */

return function($html){
	$params=['html'=>$html,'css'=>'ul li a'];
	$links=$this->mode('arr_dom_get_links_arr',$params);
	foreach($links as $key=>$value){
		$links[$key]='https://neuters.de'.$value;
	}
	return $links;
};