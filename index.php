<?php
$posts=[
	'apache'=>'Apache',
	'composer'=>"Composer",
	'css'=>'CSS',
	'crud'=>'CRUD',
	'framework'=>'Framework',
	'git'=>'Git',
	'html'=>'HTML',
	'jquery'=>'jQuery',
	'js'=>'JavaScript',
	'less'=>'Less.js',
	'medoo'=>'Medoo',
	'mustache'=>'Mustache',
	'php'=>'PHP',
	'shell'=>'Shell script',
	'sql'=>'SQL',
	'zen'=>'Zen Gaucho',
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
	$title='Gaucho';
	require 'view/index.php';
}
