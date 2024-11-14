<?php
/**
 * Date: 25/10/2024
 * Time: 19:42
 */
use src\mig;
use src\crud;
return function(){
	$this->show_errors(true);
	$type=$_ENV['CRUD_DB_TYPE'];
	$crud=new crud(null,$type,1);
	$pdo=$crud->pdo;
	$tableDir=ROOT.'/app/table';
	$debug=true;
	$mig=new mig($pdo,$tableDir,$type,$debug);
	$mig->mig();
};