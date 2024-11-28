<?php
/**
 * Date: 28/11/2024
 * Time: 20:56
 */
//sudo visudo
//www-data ALL=(ALL) NOPASSWD: /usr/sbin/service
return function($service_name){
	$cmd='sudo service '.$service_name.' restart';
	return cmd($cmd);
};