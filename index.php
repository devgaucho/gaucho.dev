<?php
$posts=[
	'apache'=>'Apache',
	'composer'=>"Composer",
	'css'=>'CSS',
	'html'=>'HTML',
	'jquery'=>'jQuery',
	'js'=>'JavaScript',
	'medoo'=>'Medoo',
	'mustache'=>'Mustache',
	'php'=>'PHP',
	'sql'=>'SQL',
];
if(
	isset(
		$_GET['post'],
		$posts[$_GET['post']]
	)
){
	$title=$posts[$_GET['post']];
	$html=file_get_contents('html/'.$_GET['post'].'.html');
	require 'view/post.php';
}else{
	require 'view/index.php';
}
