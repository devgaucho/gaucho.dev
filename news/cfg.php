<?php
/**
 * Date: 14/10/2024
 * Time: 17:24
 */

//constantes
define('ROOT',__DIR__);

//autoload
require 'app/vendor/autoload.php';
spl_autoload_register(function ($class) {
	$baseDir=ROOT.'/app/';
	$file=$baseDir.str_replace('\\','/',$class).'.php';
	if(file_exists($file)){
		require $file;
	}else{
		die('classe '.$file.' não encontrada');
	}
});

//uses
use src\env;
use src\app;

//rules
new env(ROOT.'/app/.env');
$app=new app();
$app->show_errors($_ENV['SITE_ERRORS']);
date_default_timezone_set($_ENV['SITE_TIMEZONE']);