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
			<td colspan=2>
				<?php
				require 'logo.php';
				?>
			</td>
		</tr>
		<tr>
<!-- 			<td>
				<h2>Projetos</h2>
			</td> -->			
			<td align=center width=50%>
				<h2>Rede sociais</h2>
				<!-- <a href="">Blog</a><br>				 -->
				<!-- <a href="">#bolhadev</a><br> -->
				<a href="https://github.com/devgaucho" target="_blank">Github</a><br>
				<a href="https://x.com/devgaucho" target="_blank">Twitter</a><br>
			</td>
			<td align=center width=50%>
				<h2>Web dev</h2>
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
	<p class="center">
		<small>Esse blog roda melhor em 800x600 no browser IE6 ou superior</small>
	</p>
</body>
</html>
