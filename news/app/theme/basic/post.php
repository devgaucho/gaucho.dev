<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php print htmlentities($post['title']);?></title>
	<link rel="stylesheet" href="<?php $this->asset('/style.css');?>">
	<script src="<?php $this->asset('/jquery.js');?>"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<h1><?php print htmlentities($post['title']);?></h1>
<p class="center">
	<i>
		<?php $this->e($post['created_at_h']);?> |
		<?php $this->e($post['post_length']);?> chars |
		<?php
		$href=$_ENV['SITE_URL'];
		if(isset($post['id_post_original'])){
			$href.='/post_original.php?id=';
			$href.=$post['id_post_original'];
			$text='Original';
		}else{
			$href.='/post_traduzido.php?id=';
			$href.=$post['id_post_traduzido'];
			$text='Tradução';
		}
		?>
		<a href="<?php print $href;?>">
			<?php print $text;?>
		</a>
	</i>
</p>
<font size="4">
<?php
$paragrafos=explode(PHP_EOL,$post['post']);
foreach($paragrafos as $paragrafo){
	print '<p>';
	print $paragrafo;
	print '</p>'.PHP_EOL;
}
?>
</font>
<p>
	Fonte:
	<?php
	$url=str_replace('neuters.de','reuters.com',$post['url']);
	?>
	<a target="_blank" href="<?php print $url;?>">Reuters</a>
</p>
<p class="center">
	<a href="<?php print $_ENV['SITE_URL'];?>">Voltar</a>
</p>
</body>
</html>
