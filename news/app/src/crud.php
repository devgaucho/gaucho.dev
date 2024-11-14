<?php
/**
 * Date: 14/10/2024
 * Time: 18:52
 */
namespace src;
use mysqli;
use PDO;
use PDOException;
class crud{
	var $error;
	var $last;
	var $pdo;
	private $type;
	function __construct($pdo=null,$type=null,$create_db=null){
		$this->type=$type;
		if(!is_null($create_db) AND $create_db){
			$this->create_db();
		}
		if(is_null($pdo) OR is_null($type)){
			$this->connect_to_pdo();
		}else{
			$this->pdo=$pdo;
		}
	}
	private function connect_to_mysql(){
		try{
			$dsn='mysql:host='.$_ENV['MYSQL_HOST'].';';
			$dsn.='dbname='.$_ENV['MYSQL_DB'];
			$dsn.=';charset=utf8';
			$this->pdo=new PDO(
				$dsn,
				$_ENV['MYSQL_USER'],
				$_ENV['MYSQL_PASSWORD']
			);
			$this->pdo->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
			return true;
		}catch(PDOException $e) {
			$this->error=$e->getMessage();
			return false;
		}
	}
	private function connect_to_pdo(){
		if(isset($_ENV['CRUD_DB_TYPE'])){
			$this->type=$_ENV['CRUD_DB_TYPE'];
		}else{
			$this->type=null;
		}
		switch($this->type){
			case 'mysql':
				$this->connect_to_mysql();
				break;
			case 'sqlite':
				$this->connect_to_sqlite();
				break;
			default:
				die('unknown database type');
		}
	}
	private function connect_to_sqlite(){
		$dbFile=ROOT.'/app/db/'.$_ENV['SQLITE_DB'];
		try{
			$this->pdo=new PDO("sqlite:$dbFile");
			$this->pdo->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
			return true;
		} catch (PDOException $e) {
			$this->error=$e->getMessage();
			return false;
		}
	}
	function count($table,$where=null){
		$sql='SELECT COUNT(*) FROM '.$table;
		if(!is_null($where)){
			$sql.=' '.$this->where($where);
		}
		$sql.=';';
		$mix=$this->query($sql);
		switch($this->type){
			case 'mysql':
			case 'sqlite':
				return @$mix['0']["COUNT(*)"];
				break;
		}
		return false;
	}
	function create($table,$data){
		$cols=array_keys($data);
		$cols_str=implode(',',$cols);
		$sql='INSERT INTO '.$table.'('.$cols_str.')';
		$cols_str=implode(' ,:',$cols).' ';
		$sql.=' VALUES(:'.$cols_str.');';
		$result=$this->query($sql,$data);
		if($result){
			return $this->pdo->lastInsertId();
		}else{
			return false;
		}
	}
	private function create_db(){
		switch($this->type){
			case 'mysql':
				$this->create_db_mysql();
				break;
			case 'sqlite':
				$this->create_db_sqlite();
				break;
		}
	}
	private function create_db_mysql(){
		$host=$_ENV['MYSQL_HOST'];
		$user=$_ENV['MYSQL_USER'];
		$password=$_ENV['MYSQL_PASSWORD'];
		$db_name=$_ENV['MYSQL_DB'];
		if(!@$this->db_mysql_exists($db_name)){
			$conn=new mysqli($host,$user,$password);
			$sql='CREATE DATABASE '.$db_name;
			$sql.=' CHARACTER SET utf8mb4 COLLATE ';
			$sql.='utf8mb4_unicode_ci;';
			if(mysqli_query($conn,$sql)){
				$msg='db "'.$db_name.'" criado com ';
				$msg.='sucesso'.PHP_EOL;
				print $msg;
			}else{
				$msg="erro ao criar o banco de dados";
				$msg.=PHP_EOL;
				die($msg);
			}
		}
	}
	private function create_db_sqlite(){
		$filename=ROOT.'/app/db/'.$_ENV['SQLITE_DB'];
		if(!file_exists($filename)){
			$dir=ROOT.'/app/db';
			// cria o diretório caso ele não exista
			if(!file_exists($dir)){
				if(mkdir($dir)){
					chmod($dir,0777);
					$msg='dir db criado com ';
					$msg.='sucesso';
					print $msg.PHP_EOL;
				}else{
					$msg='erro ao criar o ';
					$msg.='dir db';
					die($msg.PHP_EOL);
				}
			}
			// cria o banco caso ele não exista
			system('touch '.escapeshellarg($filename));
			chmod($filename,0777);
			if(file_exists($filename)){
				$msg='db "'.$filename;
				$msg.='" criado com sucesso'.PHP_EOL;
				print $msg;
			}else{
				$msg='erro ao criar o db '.$filename;
				die($msg.PHP_EOL);
			}
		}
	}
	private function db_mysql_exists($db_name){
		$conn=@new mysqli(
			$_ENV['MYSQL_HOST'],
			$_ENV['MYSQL_USER'],
			$_ENV['MYSQL_PASSWORD']
		);
		if(!$conn){
			return false;
		}
		$sql="SHOW DATABASES LIKE '$db_name'";
		if(
		@empty(
		mysqli_fetch_array(
			mysqli_query($conn,$sql)
		)
		)
		){
			return false;
		}else{
			return $conn;
		}
	}
	function delete($table,$where){
		try{
			$sql='DELETE FROM '.$table;
			$sql.=$this->where($where);
			return $this->query($sql);
		}catch(PDOException $e){
			$this->error=$e->getMessage();
			return false;
		}
	}
	function query($sql,$params=null){
		$this->last=$sql;
		try{
			if(is_array($params)){
				foreach($params as $key=>$value){
					$value=$this
						->pdo
						->quote($value);
					$param=':'.$key.' ';
					if(str_contains(
						$sql,
						$param
					)){
						$sql=str_replace(
							$param,
							$value,
							$sql
						);
					}

				}
			}
			$this->last=$sql;
			$stmt=$this->pdo->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($result)==0){
				return true;
			}else{
				return $result;
			}
		}catch(PDOException $e){
			$this->error=$e->getMessage();
			return false;
		}
	}
	function read($table,$where=null){
		$sql='SELECT * FROM '.$table.$this->where($where).';';
		$rows=$this->query($sql);
		if(
			isset($where['LIMIT'])
			AND  $where['LIMIT']==1
			AND isset($rows[0])
		){
			return $rows[0];
		}elseif(isset($rows[0])){
			return $rows;
		}else{
			return false;
		}
	}
	function update($table,$data,$where){
		try{
			$cols=array_keys($data);
			$sql='UPDATE `'.$table.'` SET ';
			$count=count($data);
			$i=1;
			foreach($cols as $col){
				$sql.='`'.$col.'`=:';
				$sql.=$col;
				if($count>1 and $i<$count){
					$sql.=',';
				}
				$i++;
			}
			$sql.=$this->where($where);
			return $this->query($sql,$data);
		}catch(PDOException $e){
			$this->error=$e->getMessage();
			return false;
		}
	}
	private function where($where){
		$fnBtw=function($mix,$sql){
			$str=null;
			$key=null;
			if(is_array($mix)){
				$key=key($mix);
			}
			if(is_string($key)){
				$mix=$mix[$key];
			}
			if(
				is_array($mix)
				AND count($mix)=='2'
				AND isset($mix[0],$mix[1])
				AND is_integer($mix[0])
				AND is_integer($mix[0])
				AND $mix[0]>=0
				AND $mix[1]>=0
			){
				if(
					is_string($sql)
					AND str_contains(
						$sql,
						'WHERE '
					)
				){
					$str='AND '.$key;
				}else{
					$str='WHERE '.$key;
				}
				$str.=' BETWEEN ';
				$str.=$mix[0].' AND '.$mix[1];
			}
			if(is_null($str)){
				return $str;
			}else{
				return ' '.$str;
			}
		};
		$fnLike=function($mix,$sql){//SQL-92
			$str=null;
			if(
				is_array($mix)
				AND count($mix)==1
				AND is_string(key($mix))
			){
				$key=key($mix);
				if(
					is_string($sql)
					AND str_contains(
						$sql,
						'WHERE '
					)
				){
					$str=' AND '. $key;
				}else{
					$str='WHERE '.$key;
				}
				$str.=' LIKE ';
				$str.=$this
					->pdo
					->quote('%'.$mix[$key].'%');
			}
			if(is_null($str)){
				return $str;
			}else{
				return ' '.$str;
			}
		};
		$fnLimit=function($mix){
			$str=null;
			if(
				is_integer($mix)
				AND $mix>=0
			){
				$str='LIMIT '.$mix;
			}
			if(
				is_array($mix)
				AND count($mix)=='2'
				AND isset($mix[0],$mix[1])
				AND is_integer($mix[0])
				AND is_integer($mix[0])
				AND $mix[0]>=0
				AND $mix[1]>=0
			){
				$str='LIMIT '.$mix[0];
				$str.=' OFFSET '.$mix[1];
			}
			if(is_null($str)){
				return $str;
			}else{
				return ' '.$str;
			}
		};
		$fnOrder=function($mix){
			$str=null;
			if(
				is_array($mix)
				AND count($mix)==1
				AND is_string(key($mix))
			){
				$key=key($mix);
				$str='ORDER BY '.$key;
				$str.=' '.$mix[$key];
			}
			if(is_null($str)){
				return $str;
			}else{
				return ' '.$str;
			}
		};
		$fnWhere=function($mix,$sql){
			$str=null;
			if(
				is_array($mix)
				AND count($mix)==1
			){

				$key=key($mix);
				if(
					is_string($sql)
					AND str_contains(
						$sql,
						'WHERE '
					)
				){
					$str=' AND '. $key;
				}else{
					$str='WHERE '.$key;
				}
				if(is_array($mix[$key])){
					$count=count($mix[$key]);
					if($count==1){
						$k=key($mix[$key]);
						$op=$k;
						$value=$mix[$key][$k];
					}
					if($count==2){
						$op=$mix[$key][0];
						$value=$mix[$key][1];
					}
					if(is_null($value)){
						$value=' NULL';
					}else{
						$this
							->pdo
							->quote(
								$value
							);
					}
					$str.=' '.$op.$value;
				}else{
					$str.='=';
					$str.=$this
						->pdo
						->quote($mix[$key]);
				}
			}
			if(is_null($str)){
				return $str;
			}else{
				return ' '.$str;
			}
		};
		$sql=null;
		$limit=null;
		$order=null;
		if(!is_array($where)){
			return $sql;
		}
		foreach($where as $key=>$value){
			switch($key){
				case 'BETWEEN':
					$sql.=$fnBtw(
						$where[$key],
						$sql
					);
					break;
				case 'LIKE':
					$sql.=$fnLike(
						$where[$key],
						$sql
					);
					break;
				case 'LIMIT':
					$limit=$where[$key];
					break;
				case 'ORDER':
					$order=$where[$key];
					break;
				default:
					$sql.=$fnWhere(
						[$key=>$value],
						$sql
					);
					break;
			}
		}
		if(!is_null($order)){
			$sql.=$fnOrder($order);
		}
		if(!is_null($limit)){
			$sql.=$fnLimit($limit);
		}
		return $sql;
	}
}

