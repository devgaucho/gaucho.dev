## código de resposta (http)
```
http_response_code($codigoInt);
```

## código decimal do caractere
```
$dec=ord('A');//retorna 65
```

## download via curl
```
function download($url){
	ob_start();
	$url=escapeshellarg($url);
	$cmd=' curl -s "'.$url.'"';
	system($cmd);
	$str=ob_get_contents();
	ob_end_clean();
	if(empty($str)){
		return false;
	}else{
		return $str;
	}
}
```

## email válido

```
$isValid=filter_var($email,FILTER_VALIDATE_EMAIL);
```

## escrever dados em um arquivo com append
```
file_put_contents('nome do arquivo',$dados,FILE_APPEND);
```
Fonte: [PHP](https://www.php.net/manual/en/function.file-put-contents#example-2224)

## exibir erros

```
if($bool){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}else{
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
}
```

## json (header)
```
header('Content-Type:application/json');
die(json_encode($mix,JSON_PRETTY_PRINT));
```

## json decode (array)
```
$mix=json_decode($json,true);
```

## json encode (pretty)
```
$json=json_encode($mix,JSON_PRETTY_PRINT);
```

## ler dados de um arquivo
```
$str=file_get_contents('nome_do_arquivo');
```

## match
```
$in='hello world';
$out=match($in){
        'hello world'=>'olá mundo',
        'olá mundo'=>'hello world'
};
print $out;
```

Fonte: [PHP](https://www.php.net/manual/pt_BR/control-structures.match.php)

## public/index.php

```
require __DIR__.'/../cfg.php';
```

## sleep
```
sleep(1);//pausa de 1 segundo
usleep(1);//pausa de 1 milisegundo
```

## tempo de execução em segundos.milisegundos
```
$start=hrtime(true);
sleep(2);
$end=hrtime(true);
$totalNs=$end-$start;
//$totalSMs=$totalNs/1e+9;
//$totalSMs=number_format($totalSMs,3);
$totalSMs=(($totalNs/1000)/1000)/1000;
$totalSMs=number_format($totalSMs,3);
print $totalSMs;
```

## tradução básica de strings
```
$trans=["hello"=>"olá","world"=>"mundo"];
print strtr("hello world",$trans);
```
Retorna "olá mundo"

Fonte: [PHP](https://www.php.net/manual/en/function.strtr)

## user-agent
```
$str=$_SERVER['HTTP_USER_AGENT'];
```

## versão
```
if (version_compare(PHP_VERSION, '8.0.0') < 0) {
    die("é necessário ter PHP 8 ou superior");
}
```
