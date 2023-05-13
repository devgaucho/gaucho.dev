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
	$Kit->controller('Post')->$m();
	break;		
	case 'signin':
	$Kit->controller('Signin')->$m();
	break;		
	default:
	$Kit->controller('NotFound')->get();
	break;
}