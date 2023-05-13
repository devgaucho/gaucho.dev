<?php
require __DIR__.'/cfg.php';

$s=$Kit->segment();
$m=$Kit->method();
switch ($s[1]) {
	case '/':
	$Kit->controller('Home')->get();
	break;
	case 'logout':
	$Kit->controller('Logout')->get();
	break;	
	case 'post':
	if(
		@$s[2] and
		is_numeric($s[2])
	){
		if(
			@$s[3] and
			$s[3]=='edit'
		){
			$method='update'.$m;
			$Kit->controller('Post')->$method($s[2]);
		}else{
			$Kit->controller('Post')->read($s[2]);
		}
	}else{
		$Kit->controller('Post')->$m();
	}
	break;		
	case 'signin':
	$Kit->controller('Signin')->$m();
	break;		
	default:
	$Kit->controller('NotFound')->get();
	break;
}