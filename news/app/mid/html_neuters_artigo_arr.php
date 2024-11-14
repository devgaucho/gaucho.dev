<?php
/**
 * Date: 31/10/2024
 * Time: 19:00
 */
return function($html){
	$out=null;

	//título
	$params=[
		'html'=>$html,
		'css'=>'h1'
	];
	$elements=$this->mode('arr_dom_query_obj',$params);
	foreach($elements as $key=>$element){
		if($key=='0'){
			$out['title']=$element->nodeValue;
		}
	}

//	//descrição
//	$params=[
//		'html'=>$html,
//		'css'=>'meta[property="og:description"]'
//	];
//	$elements=$this->mode('arr_dom_query_obj',$params);
//	foreach($elements as $key=>$element){
//		if($key==0){
//			if($element->hasAttribute('content')) {
//				$str=$element
//					->getAttribute('content');
//				$out['description']=$str;
//			}
//		}
//
//	}

	//parágrafos
	$params=[
		'html'=>$html,
		'css'=>'main *'
	];
	$elements=$this->mode('arr_dom_query_obj',$params);
	foreach($elements as $key=>$element){
		$value=$element->nodeValue;
		if($key==1){
			$value=explode(' - ',$value)[0];
			$created_at = strtotime($value);
			$três_horas=(60*60)*3;
			$created_at=$created_at-$três_horas;//utc-3
			$out['created_at']=$created_at;
		}else{
			if(!isset($out['post'])){
				$out['post']='';
			}
			$tag=$element->tagName;
			if(
				$tag=='p'
			){
				$post=$value.PHP_EOL;
				$post=$out['post'].$post;
				$out['post']=$post;
			}

		}
	}
	if(isset($out['post'])){
		$out['post_length']=mb_strlen($out['post']);
	}
	if(is_null($out)){
		return false;
	}
	return $out;
};