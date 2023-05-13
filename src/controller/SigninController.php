<?php
namespace src\controller;

use src\Controller;

class SigninController extends Controller{
	function get(){
		$data=[
			'title'=>'Entrar'
		];
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('signin',$data);	
	}
}