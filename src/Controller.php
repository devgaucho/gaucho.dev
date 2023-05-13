<?php
namespace src;

use gaucho\Kit;
use src\Model;

class Controller extends Kit{
	var $isAuth;
	function extraData($data){
		$data['isAuth']=$this->isAuth();		
		return $data;
	}
	function isAuth(){
		$Model=new Model();
		if(!is_array($this->isAuth)){
			$this->isAuth=$Model->isAuth();
		}
		return $this->isAuth;
	}
}