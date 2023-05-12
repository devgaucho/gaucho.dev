<?php
namespace src\controller;

use gaucho\Kit;

class HomeController extends Kit{
	function get(){
		$data=[
			'name'=>'world'
		];
		$this->view('home',$data);
	}
}