<?php
/**
 * Date: 31/10/2024
 * Time: 20:54
 */
use src\crud;
return function(){
	$this->show_errors(true);
	$crud=new crud();
	$where=[
		'id_post_traduzido'=>['IS',null],
		'ORDER'=>['created_at'=>'ASC']
	];
	$posts_originais=$crud->read('posts_originais',$where);
	if(!$posts_originais){
		$this->mode('cli_error','sem posts para traduzir');
		return false;
	}
	print 'traduzindo '.count($posts_originais).' posts'.PHP_EOL;
	foreach($posts_originais as $post){
		//resumir e traduzir o post
		if(
			empty($post['post'])
			OR mb_strlen($post['post'])<=64
		){
			$this->mode(
				'cli_error',
				'post pequeno d+ '.$post['title']
			);
			continue;
		}
		$post_resumido=$this->mode(
			'rag_resumir_e_traduzir_post',
			$post['post']
		);
		if(!$post_resumido){
			$this->mode(
				'cli_error',
				'erro ao resumir '.$post['title']
			);
			continue;
		}
		//gerar o título
		$titulo_traduzido=$this->mode(
			'rag_criar_titulo',
			$post_resumido
		);
		if(!$titulo_traduzido){
			$this->mode(
				'cli_error',
				'erro ao criar título '.$post['title']
			);
			continue;
		}
		//salvar o post traduzido
		$título_traduzido=$this->mode(
			'str_ucfirst_str',
			$titulo_traduzido
		);
		$data=[
			'title'=>$titulo_traduzido,
			'created_at'=>time(),
			'post'=>$post_resumido,
			'post_length'=>mb_strlen($post_resumido),
			'id_post_original'=>$post['id']
		];
		$id_tradução=$crud->create(
			'posts_traduzidos',
			$data
		);
		//atualizar o post original com o id do traduzido
		if(is_numeric($id_tradução)){
			$data=[
				'id_post_traduzido'=>$id_tradução
			];
			$where=[
				'id'=>$post['id']
			];
			$crud->update('posts_originais',$data,$where);
			$msg=$titulo_traduzido.' [';
			$msg.=mb_strlen($titulo_traduzido).' chars]';
			$this->mode(
				'cli_success',
				$msg
			);
		}else{
			$msg='erro ao criar o post traduzido ';
			$msg.=$titulo_traduzido;
			$this->mode(
				'cli_error',
				$msg
			);
			continue;
		}
	}
};
