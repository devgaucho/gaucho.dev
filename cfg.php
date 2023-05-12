<?php
require __DIR__.'/vendor/autoload.php';
define("ROOT",__DIR__);
use gaucho\Env;
use gaucho\Kit;

new Env;
$Kit=new Kit();
$Kit->showErrors();