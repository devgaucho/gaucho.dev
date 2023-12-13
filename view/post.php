<?php
require 'header.php';
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