<?php
/**
 * Date: 25/10/2024
 * Time: 20:09
 */
return function(){
	if($this->segment(1)<>'/'){
		$this->code(404);
		die('404');
	}
	$this->code(200);
	$posts=$this->mode("posts_traduzidos_arr");
	$data=[
		'posts'=>$posts
	];
	$this->view('index',$data);
};