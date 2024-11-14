<?php
/**
 * Date: 02/11/2024
 * Time: 20:09
 */
return function(){
	$id=$_GET['id'];
	$post=$this->mode('int_read_post_traduzido_arr',$id);
	if($post){
		$data=[
			'post'=>$post
		];
		$this->view('post',$data);
		$this->code(200);
	}else{
		die("404");
	}
};