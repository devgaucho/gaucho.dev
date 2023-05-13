<?php
namespace src;

use Medoo\Medoo;
use gaucho\Kit;
use src\model\SessionModel;
use src\model\UserModel;

class Model extends Kit{
	var $db;
	var $isAuth;
	function db(){
		if(!is_object($this->db)){
			$this->db=new Medoo([
				'type' => 'mysql',
				'host' => $_ENV['MYSQL_HOST'],
				'database' => $_ENV['MYSQL_DB'],
				'username' => $_ENV['MYSQL_USER'],
				'password' => $_ENV['MYSQL_PASSWORD'],
				'charset' => $_ENV['MYSQL_CHARSET'],
				'collation' => $_ENV['MYSQL_COLLATION'],
				'port' => $_ENV['MYSQL_PORT'],
			]);
		}
		return $this->db;
	}
	function isAuth(){
		if(!is_array($this->isAuth)){
			$session_id=@$_COOKIE['session_id'];
			$session_token=@$_COOKIE['session_token'];
			$SessionModel=new SessionModel();
			$session=$SessionModel->read($session_id);
			if(
				$session and
				$session['token']==$session_token and
				$session['token_expiration']>=time()
			){
				// ler usuário
				$UserModel=new UserModel();
				$user=$UserModel->read($session['user_id']);
				$isAuth=$user;
				$isAuth['token_md5']=md5($session['token']);
				$this->isAuth=$isAuth;
			}else{
				$this->isAuth=false;
			}
		}
		return $this->isAuth;
	}
}