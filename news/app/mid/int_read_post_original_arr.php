<?php
/**
 * Date: 31/10/2024
 * Time: 20:40
 */
use src\crud;
return function($id){
	$crud=new crud();
	$where=[
		'id'=>$id,
		'LIMIT'=>1
	];
	$post=$crud->read('posts_originais',$where);
	if($post){
		$post['created_at_h']=date('r',$post['created_at']);
		return $post;
	}else{
		return false;
	}
};