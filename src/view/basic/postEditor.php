	<div class="row">
		<div class="col3"></div>
		<div class="col6 text-center">
			<h2><?php print 'Post';?></h2>
			<?php 
			if(@$post){
				$action='/post/'.$post['id'].'/edit';
				$checked=null;
				if($post['draft']=='1'){
					$checked='checked="checked"';
				}
			}else{
				$action='/post';
			}
			?>
			<form action="<?php print $action; ?>" class="vertical big" method="post">
				<input maxlength="<?php print $_ENV['MAX_POST_TITLE_SIZE'];?>" minlength="1" name="title" placeholder="Título" type="text" required="required" value="<?php print @htmlentities($post['title']);?>">
				<textarea maxlength="<?php print $_ENV['MAX_POST_SIZE'];?>" minlength="1" name="post" placeholder="HTML" rows="20" required="required"><?php print @htmlentities($post['post']);?></textarea>
				<label>
					<input type="checkbox" name="draft" value="1" <?php print $checked;?>>
					Rascunho
				</label><br>
				<button type="submit">Salvar</button>
			</form>
		</div>
		<div class="col3"></div>
	</div>
</div><!-- container -->