<!DOCTYPE html>
<head>
	<title><?php print htmlentities($title);?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<link rel="shortcut icon" href="img/logo.jpg" />
	<meta property="og:image" content="img/logo.jpg" />
	<meta name="twitter:title" content="Gaucho.dev" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:image" content="img/logo.jpg" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<?php
	require 'logo.php';
	print '<h1>'.htmlentities($title).'</h1>';
	print $html;
	?>
	<p class="center">
		<a href=".">
			P&aacute;gina inicial
		</a>
	</p>
	<hr>
	<p class="center">
		<small>Esse blog roda melhor em 800x600 no browser IE6 ou superior</small>
	</p>	
</body>
</html>