<?php
use gaucho\Kit;

$Kit=new Kit();
?>
<!doctype html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print htmlentities($title);?></title>
	<?php
	$Kit->asset([
		'css/1k.css',
		'css/style.css'
	]);
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col12 text-center">
				<h1>
					<a href="/">
						<?php print htmlentities($SITE_NAME); ?>
					</a>
				</h1>
				<?php 
				if($isAuth){
					print '<strong>';
					print $isAuth['name'];
					print '</strong>';
					$href='/logout?token_md5='.$isAuth['token_md5'];
					$link='<a href="'.$href.'">Sair</a>';
					print ' ('.$link.')';
				}
				?>
			</div>
		</div>
