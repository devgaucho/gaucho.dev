<?php
namespace src\controller;

use src\Controller;
use src\model\PostModel;

class PostController extends Controller{
	function get(){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		$data=[
			'title'=>$_ENV['SITE_NAME'],
			'isAuth'=>$this->isAuth()
		];
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('postEditor',$data);			
	}
	function post(){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		$post=[
			'title'=>$_POST['title'],
			'post'=>$_POST['post'],
			'draft'=>@$_POST['draft'],
			'user_id'=>$isAuth['id']
		];
		$PostModel=new PostModel();
		if($PostModel->create($post)){
			$url='/post/'.$PostModel->data['id'];
			$this->redirect($url);
		}else{
			die("erro ao criar o post");
		}
	}
}