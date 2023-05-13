<?php
namespace src;

use gaucho\Kit;

class Controller extends Kit{
	function extraData($data){
		$data['SITE_NAME']=$_ENV['SITE_NAME'];
		$data['SITE_URL']=$_ENV['SITE_URL'];		
		return $data;
	}
}