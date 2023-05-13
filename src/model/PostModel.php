<?php
namespace src\model;

use src\Model;

class PostModel extends Model{
	var $data;
	function create($data){
		$db=$this->db();
		if(@$data['draft']=='1'){
			$this->data['updated_at']=time();
		}else{
			$this->data['created_at']=time();			
		}
		$this->data['user_id']=$data['user_id'];
		if(
			$this->valid($data) and
			$db->insert('posts',$this->data)
		){
			$this->data['id']=$db->id();
			return true;
		}else{
			return false;
		}
	}
	function delete($id){
		$where=[
			'id'=>$id
		];
		return $this->db()->delete('posts',$where);
	}
	function read($id,$cols=null){
		$where=[
			'id'=>$id
		];
		if(is_null($cols)){
			$cols=[
				'created_at',				
				'draft',
				'id',
				'post',
				'title',
				'user_id'
			];
		}
		return $this->db()->get('posts',$cols,$where);
	}	
	function readPosts(){
		$where=[
			'draft'=>'0',
			'ORDER'=>['created_at'=>'DESC']
		];
		return $this->db()->select('posts','*',$where);
	}
	function readPostsByUserId($user_id){
		$where=[
			'user_id'=>$user_id,
			'ORDER'=>['id'=>'DESC']
		];
		return $this->db()->select('posts','*',$where);
	}	
	function update($id,$data){
		$post=$this->read($id);
		if(!$post){
			return false;
		}
		$this->data['id']=$post['id'];
		$db=$this->db();
		if(@$data['draft']=='1'){
			$this->data['updated_at']=time();
		}else{
			if(is_null($post['created_at'])){
				$this->data['created_at']=time();
			}			
		}
		$where=[
			'id'=>$id
		];
		if(
			$this->valid($data) and
			$db->update('posts',$this->data,$where)
		){
			return true;
		}else{
			return false;
		}
	}
	function valid($data){
		if(!$this->validDraft($data['draft'])){
			return false;
		}			
		if(!$this->validPost($data['post'])){
			return false;
		}			
		if(!$this->validTitle($data['title'])){
			return false;
		}
		return true;
	}
	function validDraft($str){
		if(is_string($str)){
			$str=trim($str);
		}
		if($str=='1'){
			$this->data['draft']='1';
		}else{
			$this->data['draft']='0';			
		}
		return true;
	}
	function validPost($str){
		$str=trim($str);
		$len=mb_strlen($str);
		if($len>=1 and $len<=$_ENV['MAX_POST_SIZE']){
			$this->data['post']=$str;
			return true;
		}else{
			return false;
		}
	}
	function validTitle($str){
		$arr=explode(' ',$str);
		$arr=array_map('trim',$arr);
		$arr=array_values(array_filter($arr));		
		$str=implode(' ',$arr);
		$error=false;
		$len=mb_strlen($str);
		if(
			$len>=1 and
			$len<=$_ENV['MAX_POST_TITLE_SIZE']
		){
			$this->data['title']=$str;
			return true;
		}else{
			return false;
		}
	}
}