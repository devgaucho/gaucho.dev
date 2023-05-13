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
		'css/style.css',
		'js/main.js'
	]);
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fork-awesome/1.2.0/css/fork-awesome.min.css" integrity="sha512-aupidr80M36SeyviA/hZ2uEPnvt2dTJfyjm9y6z1MgaV13TgzmDiFdsH3cvSNG27mRIj7gJ2gNeg1HeySJyE3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col12 text-center">
				<h1>
					<a href="/">
						<?php print htmlentities(
							$_ENV['SITE_NAME']
						); ?>
					</a>
				</h1>
				<?php 
				if(@$isAuth){
					print '<a href="/post">Criar post</a>';
					print ' &bull; ';
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
