<?php
/**
 * Date: 29/10/2024
 * Time: 21:07
 */
return function($params){
	$arr=[
		'html'=>$params['html'],
		'css'=>$params['css']
	];
	$links_obj=$this->mode('arr_dom_query_obj',$arr);
	$hrefs=[];
	foreach($links_obj as $link){
		if($link->hasAttribute('href')) {
			$hrefs[]=$link->getAttribute('href');
		}
	}
	return $hrefs;
};