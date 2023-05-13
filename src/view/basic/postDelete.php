<?php
$title='Confirmação';
require 'inc/header.php';
?>
<div class="row">
	<div class="col3"></div>
	<div class="col6 text-center">
		<h2>Confirmação</h2>
		<p>
			Deseja apagar o post <strong><?php print htmlentities($post['title']);?></strong>?
		</p>
		<?php
		$action='/post/'.$post['id'].'/delete';
		?>
		<form action="<?php print $action;?>" method="post">
			<button name="confirm" type="submit" value="1">
				Sim
			</button>
			<button name="confirm" type="submit" value="0">
				Não
			</button>				
		</form>
	</div>
	<div class="col3"></div>
</div>
</div><!-- container -->