<?php
/**
 * Date: 29/10/2024
 * Time: 21:03
 */
use src\css2xpath;
return function($params){
	$xpathExpression=new css2xpath($params['css']);
	//fix do html inválido
	libxml_use_internal_errors(true);
	$dom=new DOMDocument();
	$dom->loadHTML($params['html']);
	$xpath=new DOMXPath($dom);
	return $xpath->query($xpathExpression);
};