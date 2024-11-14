<?php
/**
 * Date: 02/11/2024
 * Time: 20:07
 */
use src\crud;
return function(){
	$crud=new crud();
	$where=[
		'ORDER'=>['created_at'=>"DESC"]
	];
	return $crud->read('posts_traduzidos',$where);
};