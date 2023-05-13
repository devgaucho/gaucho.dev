<?php
namespace src\controller;

use src\Controller;
use src\model\UserModel;

class SigninController extends Controller{
	function get(){
		if($this->isAuth()){
			$this->redirect('/');
		}else{
			$data=[
				'title'=>'Criar post'		
			];
			$data=$this->extraData($data);
			$this->view('inc/header',$data);
			$this->view('signin',$data);
		}	
	}
	function post(){
		$email=$_POST['email'];
		$password=$_POST['password'];
		// validar email & senha
		$UserModel=new UserModel();
		$user=$UserModel->readByEmailAndPassword($email,$password);
		if(!$user){
			die("dados inválidos");
		}
		// criar sessão
		$Session=$this->model('Session');
		if(
			$Session->create($user['id'])
		){
			$SessionId=$Session->data['id'];
			$SessionToken=$Session->data['token'];
			$SessionTokenExp=$Session->data['token_expiration'];
			// setar cookies		
			setcookie(
				'session_id',
				$SessionId,
				$SessionTokenExp,
				'/'
			);
			setcookie(
				'session_token',
				$SessionToken,
				$SessionTokenExp,
				'/'
			);	
			// redirecionar pra home
			$this->redirect('/');
		}else{
			die("erro");
		}
	}

}