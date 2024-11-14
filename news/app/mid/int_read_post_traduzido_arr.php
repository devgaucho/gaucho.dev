<?php
/**
 * Date: 02/11/2024
 * Time: 20:10
 */
use src\crud;
return function($id){
	$crud=new crud();
	$where=[
		'id'=>$id,
		'LIMIT'=>1
	];
	$post=$crud->read('posts_traduzidos',$where);
	if($post){
		$where=[
			'id'=>$post['id_post_original'],
			'LIMIT'=>1
		];
		$post_original=$crud->read('posts_originais', $where);
		$post['url']=$post_original['url'];
		$post['created_at_h']=date('r',$post['created_at']);
		return $post;
	}else{
		return false;
	}
};