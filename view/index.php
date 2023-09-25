<!DOCTYPE html>
<head>
	<title>Gaucho.dev</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="img/logo.jpg" />
	<meta property="og:image" content="img/logo.jpg" />
	<meta name="twitter:title" content="Gaucho.dev" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:image" content="img/logo.jpg" />
	<link rel="stylesheet" href="css/style.css" />	
</head>
<body>
	<table class=container width=100%>
		<tr>
			<td>
				<?php
				require 'logo.php';
				?>
			</td>
		</tr>
		<tr>		
			<td align=center width=100%>
				<h2>Códigos</h2>
				<!-- <a href="?post=composer">Composer</a><br> -->
				<?php
				foreach($posts as $arquivoDoPost=>$tituloDoPost){
					print '<a href="?post='.$arquivoDoPost.'">'.$tituloDoPost.'</a><br>';
				}
				?>
			</td>			
		</tr>
	</table>
	<hr>
	<?php require 'footer.php'; ?>
</body>
</html>
