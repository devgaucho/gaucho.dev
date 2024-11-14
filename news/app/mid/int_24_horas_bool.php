<?php
/**
 * Date: 05/11/2024
 * Time: 20:17
 */
return function($timestamp){
	$um_dia_atrás=time()-(24*60*60);
	if($timestamp>=$um_dia_atrás){
		return true;
	}else{
		return false;
	}
};