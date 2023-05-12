<?php
require __DIR__.'/cfg.php';

use src\controller\HomeController;

$s=$Kit->segment();
switch ($s[1]) {
	case '/':
		$obj=new HomeController();
		$obj->get();
		break;
	default:
		# code...
		break;
}