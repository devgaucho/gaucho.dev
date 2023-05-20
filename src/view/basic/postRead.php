<?php
use gaucho\Kit;
$title=$post['title'];
require 'inc/header.php';
$Kit=new Kit();
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
		print $Kit->markdown($post['post']);
		$text=$post['title'].' '.$_ENV['SITE_URL'].'/post/';
		$text.=$post['id'];
		$text.=' #bolhadev';
		$text=urlencode($text);
		?>
		<p class="text-center link-social">
			<a href="/">
				<i class="fa fa-home" aria-hidden="true"></i>
				Voltar para a página inicial
			</a>
		</p>
	</div><!-- col6 -->
	<div class="col3"></div>
</div><!-- row -->
</div><!-- container -->