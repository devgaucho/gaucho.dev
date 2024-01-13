<?php
$posts=[
	'apache'=>'Apache',
	'composer'=>"Composer",
	'css'=>'CSS',
	'git'=>'Git',
	'html'=>'HTML',
	'jquery'=>'jQuery',
	'js'=>'JavaScript',
	'medoo'=>'Medoo',
	'mustache'=>'Mustache',
	'php'=>'PHP',
	'shell'=>'Shell script',
	'sql'=>'SQL',
	'zen'=>'Zen do Gaucho',
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
	$title='Gaucho.dev';
	require 'view/index.php';
}
