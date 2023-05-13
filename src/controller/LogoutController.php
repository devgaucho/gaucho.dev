<?php
namespace src\controller;

use src\model\SessionModel;
use src\Controller;

class LogoutController extends Controller{
	function get(){
		$isAuth=$this->isAuth();
		if($isAuth['token_md5']==$_GET['token_md5']){
			setcookie(
				'session_id',
				null,
				-1,
				'/'
			);
			setcookie(
				'session_token',
				null,
				-1,
				'/'
			);
		}
		$this->redirect('/');
	}
}