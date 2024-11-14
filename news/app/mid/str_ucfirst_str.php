<?php
/**
 * Date: 04/11/2024
 * Time: 20:03
 */
return function($str) {
	return mb_strtoupper(mb_substr($str,0,1)).mb_substr($str,1);
};