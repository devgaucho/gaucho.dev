<?php
/**
 * Date: 25/10/2024
 * Time: 19:24
 */
namespace src;
class app{
	var $crud;
	function asset($relative){
		$str=$_ENV['SITE_URL'];
		$str.=$relative.'?';
		$str.=md5_file(ROOT.'/'.$relative);
		print $str;
	}
	function code($code){
		@http_response_code($code);
	}
	function e($str,$print=true){
		$html=htmlentities($str);
		if($print){
			print $html;
		}else{
			return $html;
		}
	}
	function method(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			return 'POST';
		}else{
			return 'GET';
		}
	}
	function mid($name,$mix=null){
		$filename=ROOT.'/app/mid/'.$name.'.php';
		if(file_exists($filename)){
			$fn=require $filename;
			if(is_callable($fn)){
				if(is_null($mix)){
					return $fn();
				}else{
					return $fn($mix);
				}
			}else{
				$msg="function app/mid/";
				$msg.=$name.'.php';
				$msg.=' is not callable';
				die($msg);
			}
		}else{
			die('app '.$filename.' not found');
		}
	}
	function mode($name,$mix=null){
		return $this->mid($name,$mix);
	}
	function random($tamanho=11){
		$str='0123456789abcdefghijklmnopqrstuvwxyz';
		$str.='ABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
		$randomStr = '';
		for ($i = 0; $i < $tamanho; $i++) {
			$randomStr.=$str[rand(0, mb_strlen($str)-1)];
		}
		return $randomStr;
	}
	function redirect($url,$relative=true){
		if($relative){
			$url=$_ENV['SITE_URL'].$url;
		}
		header('Location: '.$url);
		die();
	}
	function segment($segment_id=null){
		$str=$_SERVER["REQUEST_URI"];
		$str_fix=null;
		$count=0;
		if(isset($_ENV['SITE_URL'])){
			$arr_fix=explode('/',$_ENV['SITE_URL']);
			unset($arr_fix[0]);
			unset($arr_fix[1]);
			unset($arr_fix[2]);
			$count=count($arr_fix);
			if($count>0){
				$str_fix='/'.implode('/',$arr_fix);
			}
		}
		$str=@explode('?', $str)[0];
		if($count>0){
			$arr_fix=explode($str_fix,$str);
			unset($arr_fix[0]);
			$str=implode('/',$arr_fix);
		}
		$arr=explode('/', $str);
		foreach($arr as $key=>$value){
			if(empty($value) and $value<>'0'){
				unset($arr[$key]);
			}
		}
		$arr=array_values($arr);
		if (count($arr)<1) {
			$segment[1]='/';
		} else {
			$i=1;
			foreach ($arr as $key => $value) {
				$segment[$i++]=$value;
			}
		}
		if (is_null($segment_id)) {
			return $segment;
		} else {
			if (isset($segment[$segment_id])) {
				return $segment[$segment_id];
			} else {
				return false;
			}
		}
	}
	function show_errors($bool){
		if($bool){
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
		}else{
			ini_set('display_errors', 0);
			ini_set('display_startup_errors', 0);
			error_reporting(0);
		}
	}
	function view($name,$data=null,$print=true){
		$filename=ROOT.'/app/theme/'.$_ENV['SITE_THEME'];
		$filename.='/'.$name.'.php';
		if(!file_exists($filename)){
			die('view '.$filename.' not found');
		}
		$data['app']=$this;
		extract($data);
		ob_start();
		require $filename;
		$out_str=ob_get_contents();
		ob_end_clean();
		if($print){
			print $out_str;
		}else{
			return $out_str;
		}
	}
}