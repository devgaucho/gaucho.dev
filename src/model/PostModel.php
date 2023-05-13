<?php
namespace src\model;

use src\Model;

class PostModel extends Model{
	var $data;
	function create($data){
		$db=$this->db();
		$this->data['created_at']=time();
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
				'title'
			];
		}
		return $this->db()->get('posts',$cols,$where);
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