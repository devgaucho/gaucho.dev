<?php
require __DIR__.'/../cfg.php';

use gaucho\Mig;
use src\Model;

$Model=new Model();
$pdo=$Model->db()->pdo;
$tableDirectory=ROOT.'/src/table';
$dbType='mysql';
$Mig=new Mig($pdo,$tableDirectory,$dbType);
$Mig->mig();