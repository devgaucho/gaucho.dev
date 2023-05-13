<?php
foreach ($posts as $post) {
	$href='/post/'.$post['id'];
	if(@$post['created_at']){
		$date=date("d.M.Y h:i A", $post['created_at']);
	}else{
		$date=date("d.M.Y h:i A", $post['updated_at']);
	}
	print $date.' - ';
	$link='<a href="'.$href.'">'.$post['title'].'</a>';
	print $link.'<br>';
}