<?php
namespace src\controller;

use src\Controller;

class HomeController extends Controller{
	function get(){
		$data=[
			'title'=>$_ENV['SITE_NAME'],
			'isAuth'=>$this->isAuth()
		];
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('home',$data);		
	}
}