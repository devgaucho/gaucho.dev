<?php
$posts=[
	'apache'=>'Apache',
	'composer'=>"Composer",
	'css'=>'CSS',
	'crud'=>'CRUD',
	'git'=>'Git',
	'html'=>'HTML',
	'jquery'=>'jQuery',
	'js'=>'JavaScript',
	'less'=>'Less.js',
	'medoo'=>'Medoo',
	'mustache'=>'Mustache',
	'php'=>'PHP',
	'regex'=>'Regex',
	'shell'=>'Shell script',
	//'spa'=>'SPA (framework)',
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
