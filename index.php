<?php
$posts=[
	'css'=>'CSS',
	'html'=>'HTML',
	'jquery'=>'jQuery',
	'js'=>'JavaScript',
	'php'=>'PHP'
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