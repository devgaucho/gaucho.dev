## arredondar para baixo

```
number_format(floor('0.055' * 100) / 100, 2, '.', '');//retorna 0.05
```

## arredondar para cima

```
number_format('0.055',2);//retorna 0.06
```

## cmd

```
function cmd($cmd,$raw=false){
	// Abre um manipulador de arquivo para read e write
	$descriptorspec=[
		//stdin é um pipe que o processo filho lê
		0=>["pipe","r"],
		//stdout é um pipe que o processo pai escreve
		1=>["pipe","w"],
		//stderr é um pipe que o processo pai escreve
		2=>["pipe","w"]
	];
	// Inicia o processo
	$process=proc_open($cmd,$descriptorspec,$pipes);
	if(is_resource($process)){
		// Fecha os pipes de entrada
		fclose($pipes[0]);
		// Lê a saída do processo
		$output=stream_get_contents($pipes[1]);
		fclose($pipes[1]);
		// Lê a saída de erro do processo
		$error=stream_get_contents($pipes[2]);
		fclose($pipes[2]);
		// captura o código de retorno
		$fileDescriptor=proc_close($process);
		$out=[
			'stdout' => $output,//stdout
			'stderr' => $error,//stderr
			//0 = default, 127 = not found
			'file_descriptor' => $fileDescriptor
		];
		if($raw){
			return $out;
		}
		if($out['file_descriptor']=='0'){
			return $output;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
```

## código de resposta (http)
```
http_response_code($codigoInt);
```

## código decimal do caractere
```
$dec=ord('A');//retorna 65
```

## contém
```
if(str_contains('hello world','hello')){
	print 'a string "hello world" contém a string "hello"';
}
```

## dom

```
<?php
//composer require phpgt/cssxpath
namespace src;
use Gt\CssXPath\Translator;
use DOMDocument;
use DOMXPath;
class DOM
{
	function getLinks($html,$cssExpression='a'){
		$links=$this->query($html,$cssExpression);
		$hrefs=[];
		foreach($links as $link){
			if($link->hasAttribute('href')) {
				$hrefs[]=$link->getAttribute('href');
			}
		}
		return $hrefs;
	}
	function query($html,$cssExpression){
		$xpathExpression=new Translator($cssExpression);
		//fix do html inválido
		libxml_use_internal_errors(true);
		$dom=new DOMDocument();
		$dom->loadHTML($html);
		$xpath=new DOMXPath($dom);	
		return $xpath->query($xpathExpression);
	}
}
```

## download via curl
```
function download($url){
	ob_start();
	$url=escapeshellarg($url);
	$cmd='curl -s "'.$url.'"';
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

### headers (apache)

```
print '<pre>';
$headers=apache_request_headers();
foreach($headers as $header=>$value){
	print $header.': '.$value'.PHP_EOL;
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

## json validate (polyfill php < 8.3)

```
if(!function_exists("json_validate")) {
	function json_validate(string $string): bool {
	    json_decode($string);

	    return json_last_error() === JSON_ERROR_NONE;
	}
}
```

Fonte: [PHP](https://www.php.net/manual/en/function.json-validate.php)

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
## remover espaços duplicados

```
$str=preg_replace('/\s+/',' ',$str);
```

## remover quebras de linha duplicadas

```
$str=str_replace("\r\n\r\n","\r\n",$str);
```

## sleep
```
sleep(1);//pausa de 1 segundo
usleep(1);//pausa de 1 milisegundo
```

## tempo de execução em segundos.milisegundos
```
$start=hrtime(true);
//código a ser executado
$end=hrtime(true);
$totalNs=$end-$start;
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
