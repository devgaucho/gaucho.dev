<?php
namespace src;

use Medoo\Medoo;
use gaucho\Kit;

class Model extends Kit{
	var $db;
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
}