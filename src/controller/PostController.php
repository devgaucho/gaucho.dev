<?php
namespace src\controller;

use src\Controller;
use src\model\PostModel;

class PostController extends Controller{
	function createGet(){
		$this->updateGet();
	}
	function createPost(){
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
			$url='/post/'.$PostModel->data['id'].'/edit';
			$this->redirect($url);
		}else{
			die("erro ao criar o post");
		}
	}
	function deleteGet($id){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		$PostModel=new PostModel();
		$post=$PostModel->read($id);
		if(!$post){
			$this->notFound();
		}
		// verifica se o post existe e é do usuário
		if($post['user_id']<>$isAuth['id']){
			$this->redirect('/signin');
		}		
		// exibe a tela de exclusão
		$data=[
			'post'=>$post
		];
		$this->view("postDelete",$data);
	}
	function deletePost($id){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		// verifica se o post existe e é do usuário
		$PostModel=new PostModel();
		$post=$PostModel->read($id);
		// verifica se o post existe e é do usuário
		if($post['user_id']<>$isAuth['id']){
			$this->redirect('/signin');
		}else{
			if($_POST['confirm']=='1'){
				$PostModel->delete($id);
			}
		}
		$this->redirect('/');
	}
	function get(){
		$this->createGet();
	}
	function read($id){
		$isAuth=$this->isAuth();
		// verifica se o post existe
		$PostModel=new PostModel();
		$post=$PostModel->read($id);
		if(
			$post
		){
			// verifica se o post é visivel pelo usuário
			if(
				$post['draft']=='1' and
				$post['user_id']<>@$isAuth['id']
			){
				$this->redirect('/signin');
			}else{
				// exibe o post
				$data=[
					'post'=>$post
				];
				$this->view('postRead',$data);
			}
		}else{
			$this->notFound();
		}
	}
	function post(){
		$this->createPost();
	}
	function updateGet($id=null){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		$data=[
			'title'=>$_ENV['SITE_NAME'],
			'isAuth'=>$this->isAuth()
		];
		if(!is_null($id)){
			$PostModel=new PostModel();
			$data['post']=$PostModel->read($id);
		}		
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('postEditor',$data);
	}
	function updatePost($id){
		$isAuth=$this->isAuth();
		if(!$isAuth){
			$this->redirect('/signin');
		}
		$post=[
			'title'=>$_POST['title'],
			'post'=>$_POST['post'],
			'draft'=>@$_POST['draft']
		];
		$PostModel=new PostModel();
		if($PostModel->update($id,$post)){
			$url='/post/'.$PostModel->data['id'].'/edit';
			$this->redirect($url);
		}else{
			die("erro ao criar o post");
		}
	}
}