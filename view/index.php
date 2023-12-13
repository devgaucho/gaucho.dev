<?php
require 'header.php';
?>
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
			<h2>Artigos</h2>
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
