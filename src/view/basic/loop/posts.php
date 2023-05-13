<?php
foreach ($posts as $post) {

	if(@$post['created_at']){
		$date=date("d.M.Y h:i A", $post['created_at']);
	}else{
		$date=date("d.M.Y h:i A", $post['updated_at']);
	}
	print $date.' - ';

	if($isAuth){
		// link pra editar
		$href='/post/'.$post['id'].'/edit';
		print '<a href="'.$href.'"><i class="fa fa-pencil"></i></a>';		
		// link pra apagar
		$href='javascript:apagarPost('.$post['id'].');';
		print ' <a href="'.$href.'"><i class="fa fa-trash"></i></a> ';		
	}
	// link para ver
	$href='/post/'.$post['id'];
	$link='<a href="'.$href.'">'.$post['title'].'</a>';
	print $link.'<br>';
}