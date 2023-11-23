<!DOCTYPE html>
<head>
	<title><?php print htmlentities($title);?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<link rel="shortcut icon" href="img/logo.jpg" />
	<meta property="og:image" content="img/logo.jpg" />
	<meta name="twitter:title" content="<?php print htmlentities($title);?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:image" content="img/logo.jpg" />
	<link rel="stylesheet" href="css/style.css?v2" />
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
	<?php require 'footer.php'; ?>
</body>
</html>
