<!doctype html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title><?php print htmlentities($_ENV['SITE_NAME']);?></title>
	<link rel="stylesheet" href="<?php $this->asset('/style.css');?>">
	<script src="<?php $this->asset('/jquery.js');?>"></script>
</head>
<body>
<h1><?php print htmlentities($_ENV['SITE_NAME']);?></h1>
<ul id="posts">
<?php
if(!is_array($posts)){
	die("nenhum post");
}
foreach($posts as $post){
	print '<li>';
	$href=$_ENV['SITE_URL'];
	$href.='/post_traduzido.php?id='.$post['id'];
	print '<small>';
	print date('r',$post['created_at']);
	print ' ~ ';
	print $post['post_length'].' chars | ';
	print count(explode(PHP_EOL,trim($post['post']))).' parágrafos';
	print '</small><br>';
	print '<a href="'.$href.'">'.$post['title'].'</a>';
	print '</li>';
}
?>
</ul>
</body>
</html>
