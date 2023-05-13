<?php
$title=$post['title'];
require 'inc/header.php';
?>
<div class="row">
	<div class="col3"></div>
	<div class="col6">
		<h1 class="text-center">
			<?php
			print htmlentities($post['title']);
			?>
		</h1>
		<?php 
		print nl2br($post['post']);
		?>
	</div><!-- col6 -->
	<div class="col3"></div>
</div><!-- row -->
</div><!-- container -->