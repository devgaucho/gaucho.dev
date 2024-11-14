<?php
/**
 * Date: 31/10/2024
 * Time: 20:40
 */
return function(){
	$id=$_GET['id'];
	$post=$this->mode('int_read_post_original_arr',$id);
	$data=[
		'post'=>$post
	];
	$this->view('post',$data);
	$this->code(200);
};