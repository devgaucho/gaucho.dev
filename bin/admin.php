<?php
require __DIR__.'/../cfg.php';

use src\model\UserModel;

$user=[
	'email'=>$_ENV['USER_EMAIL'],	
	'name'=>$_ENV['USER_NAME'],
	'password'=>$_ENV['USER_PASSWORD']
];
$UserModel=new UserModel();
$UserModel->create($user);
if($UserModel->existsByEmail($user['email'])){
	print 'administrador adicionado';
}else{
	print 'erro ao salvar o administrador no db';
}
print PHP_EOL;