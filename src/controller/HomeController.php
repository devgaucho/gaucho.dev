<?php
namespace src\controller;

use src\Controller;
use src\model\PostModel;

class HomeController extends Controller{
	function get(){
		$PostModel=new PostModel();
		$isAuth=$this->isAuth();
		if($isAuth){
			$posts=$PostModel->readPostsByUserId($isAuth['id']);
		}else{
			$posts=$PostModel->readPosts();	
		}
		$data=[
			'title'=>$_ENV['SITE_NAME'],
			'posts'=>$posts
		];
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('home',$data);		
	}
}