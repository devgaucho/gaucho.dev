	<div class="row">
		<div class="col3"></div>
		<div class="col6">
			<?php
			if($posts){
				require 'loop/posts.php';
			}else{
				print '<p class="text-center">';
				print 'Nenhum post para exibir';
				print '</p>';
			}
			?>
		</div>
		<div class="col3"></div>		
	</div>
</div>