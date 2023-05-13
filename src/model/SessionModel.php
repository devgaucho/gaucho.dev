<?php
namespace src\model;

use src\Model;

class SessionModel extends Model{
	var $data;
	function create($user_id){
		$db=$this->db();
		$this->data['user_id']=$user_id;
		$this->data['token']=$this->random();
		$this->data['created_at']=time();
		$this->setTokenExpiration();
		if($db->insert('sessions',$this->data)){
			$this->data['id']=$db->id();
			return true;
		}else{
			return false;
		}
	}
	function read($id){
		$where=[
			'id'=>$id
		];
		return $this->db()->get('sessions','*',$where);
	}
	function setTokenExpiration(){
		$duracao_em_dias=365*2;
		$duracao_em_horas=$duracao_em_dias*24;
		$duracao_em_minutos=$duracao_em_horas*60;
		$duracao_em_segundos=$duracao_em_minutos*60;
		$token_expiration=time()+$duracao_em_segundos;
		$this->data['token_expiration']=$token_expiration;
	}
}