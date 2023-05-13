<?php
require __DIR__.'/cfg.php';

function controller($name){
	global $Kit;
	$root=$Kit->root();
	$className=$name.'Controller';
	$filename=$root.'/src/controller/'.$className.'.php';
	if(file_exists($filename)){
		require $filename;
		$ns='src\controller\\'.$className;
		$obj=new $ns();
		return $obj;
	}else{
		die('controller <b>'.$filename.'</b> not found');
	}
}

$s=$Kit->segment();
$m=$Kit->method();
switch ($s[1]) {
	case '/':
		controller('Home')->get();
		break;
	case 'signin':
		controller('Signin')->$m();
		break;		
	default:
		controller('NotFound')->get();
		break;
}