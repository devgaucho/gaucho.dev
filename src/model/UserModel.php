<?php
namespace src\model;

use src\Model;

class UserModel extends Model{
	var $data;
	function create($data){
		$db=$this->db();
		$this->data['created_at']=time();
		if(
			$this->valid($data) and
			$db->insert('users',$this->data)
		){
			$this->data['id']=$db->id();
			return true;
		}else{
			return false;
		}
	}
	function existsByEmail($email){
		$where=[
			'email'=>$email
		];
		return $this->db->has('users',$where);
	}
	function read($id,$cols=null){
		$where=[
			'id'=>$id
		];
		if(is_null($cols)){
			$cols=[
				'id',
				'name'
			];
		}
		return $this->db()->get('users',$cols,$where);
	}	
	function readByEmailAndPassword($email,$password){
		$db=$this->db();
		$where=[
			'email'=>$email
		];
		$user=$db->get('users','*',$where);
		if(
			$user and
			password_verify($password,$user['password_hash'])
		){
			return $user;
		}else{
			return false;
		}
	}
	function valid($data){
		if(!$this->validEmail($data['email'])){
			return false;
		}
		if(!$this->validName($data['name'])){
			return false;
		}			
		if(!$this->validPassword($data['password'])){
			return false;
		}		
		return true;
	}
	function validEmail($str){
		$str=trim(mb_strtolower($str));
		$len=mb_strlen($str);
		if(
			$len>=6 and
			$len<=32 and
			filter_var($str, FILTER_VALIDATE_EMAIL)
		){
			$where=[
				'email'=>$str
			];
			if($this->db()->has('users',$where)){
				return false;
			}else{	
				$this->data['email']=$str;
				return true;				
			}
		}else{
			return false;
		}
	}
	function validName($str){
		$arr=explode(' ',$str);
		$arr=array_map('trim',$arr);
		$arr=array_values(array_filter($arr));		
		$str=implode(' ',$arr);
		$len=mb_strlen($str);
		if(
			$len>=1 and
			$len<=32
		){
			$this->data['name']=$str;
			return true;
		}else{
			return false;
		}
	}	
	function validPassword($str){
		$len=mb_strlen($str);
		if(
			$len>=8 and
			$len<=32
		){
			$this->data['password_hash']=password_hash($str,1);
			return true;
		}else{	
			return false;
		}
	}
}