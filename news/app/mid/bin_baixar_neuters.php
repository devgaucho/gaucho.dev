<?php
/**
 * Date: 31/10/2024
 * Time: 19:26
 */
use src\crud;
return function(){
	$html=$this->mode('str_baixar_str','https://neuters.de/');
	if(!$html){
		die("erro ao baixar da neuters.de");
	}
	$links_arr=$this->mode('html_neuters_links_arr',$html);
	$crud=new crud();
	print 'verificando se os posts estão no db...'.PHP_EOL;
	foreach($links_arr as $key=>$url){
		$where=[
			'url'=>$url,
			'LIMIT'=>1
		];
		$post=$crud->read('posts_originais',$where);
		if($post){
			$this->mode(
				'cli_error',
				'skip '.$post['title']
			);
			unset($links_arr[$key]);
		}
	}
	print 'salvando posts no db...'.PHP_EOL;
	foreach($links_arr as $key=>$url){
		$html=$this->mode('str_baixar_str',$url);
		$post=$this->mode('html_neuters_artigo_arr',$html);

		//verificar se o post foi criado a menos de 24 horas
		if(
		!$this->mode('int_24_horas_bool',$post['created_at'])
		){
			$msg='post criado a mais de 24 horas ~ ';
			$msg.=$post['title'];
			$this->mode(
				'cli_error',
				$msg
			);
			continue;
		}

		//verificar o número de parágrafos
		$count_paragrafos=count(
			explode(PHP_EOL,trim($post['post']))
		);
		if($count_paragrafos<3){
			$msg=$count_paragrafos.' parágrafos ~ ';
			$msg.=$post['title'];
			$this->mode(
				'cli_error',
				$msg
			);
			continue;
		}

		//verificar o tamanho do post
		$post_len=mb_strlen($post['post']);
		//reserva 1k chars pra rag
		$max_len=bcsub($_ENV['AI_MAX_TOKENS'],1000);
		if($post_len>$max_len){
			$msg=$post_len.' chars ~ ';
			$msg.=$post['title'];
			$this->mode(
				'cli_error',
				$msg
			);
			continue;
		}

		$post['url']=$url;
		$post_id=$crud->create('posts_originais',$post);
		if(is_numeric($post_id)){
			$this->mode(
				'cli_success',
				$post['title']
			);
		}else{
			$this->mode(
				'cli_error',
				'erro:'
			);
			var_dump($crud->error);
			print 'last: ';
			var_dump($crud->last);
			print 'post_id: ';
			var_dump($post_id);
			print PHP_EOL;
		}
	}
};