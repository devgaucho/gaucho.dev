	<div class="row">
		<div class="col3"></div>
		<div class="col6 text-center">
			<h2><?php print 'Post';?></h2>
			<form action="/post" class="vertical big" method="post">
				<input maxlength="<?php print $_ENV['MAX_POST_TITLE_SIZE'];?>" minlength="1" name="title" placeholder="Título" type="text" required="required">
				<textarea maxlength="<?php print $_ENV['MAX_POST_SIZE'];?>" minlength="1" name="post" placeholder="HTML" rows="20" required="required"></textarea>
				<label>
					<input type="checkbox" name="draft" value="1">
					Rascunho
				</label><br>
				<button type="submit">Salvar</button>
			</form>
		</div>
		<div class="col3"></div>
	</div>
</div><!-- container -->