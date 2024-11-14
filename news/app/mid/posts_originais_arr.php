<?php
/**
 * Date: 31/10/2024
 * Time: 20:34
 */
use src\crud;
return function(){
	$crud=new crud();
	$where=[
		'ORDER'=>['created_at'=>"DESC"]
	];
	return $crud->read('posts_originais',$where);
};