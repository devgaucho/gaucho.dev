<?php
namespace src\controller;

use src\Controller;

class NotFoundController extends Controller{
	function get(){
		$data=[
			'title'=>'Erro'
		];
		$data=$this->extraData($data);
		$this->view('inc/header',$data);
		$this->view('404',$data);		
	}
}