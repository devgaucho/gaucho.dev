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
	<link rel="shortcut icon" href="<?php print $_ENV['SITE_URL'];?>/img/<?php print $_ENV['SITE_LOGO'];?>">
	<meta property="og:image" content="<?php print $_ENV['SITE_URL'];?>/img/<?php print $_ENV['SITE_LOGO'];?>" />
	<meta name="twitter:title" content="<?php print htmlentities($title);?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:image" content="<?php print $_ENV['SITE_URL'];?>/img/<?php print $_ENV['SITE_LOGO'];?>">	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col12 text-center">
				<a href="<?php print $_ENV['SITE_URL']; ?>" title="<?php print htmlentities(
					$_ENV['SITE_NAME']
					); ?>">
					<img class="circle" height="120" width="120" src="<?php print $_ENV['SITE_URL'];?>/img/<?php print $_ENV['SITE_LOGO'];?>" alt="<?php print htmlentities(
					$_ENV['SITE_NAME']
					); ?>">
				</a>
				<?php 
				if(@$isAuth){
					print '<br><a href="/post">Criar post</a>';
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
