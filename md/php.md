## código de resposta (http)
```
http_response_code($codigoInt);
```

## código decimal do caractere
```
$dec=ord('A');//retorna 65
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

## public/index.php

```
require __DIR__.'/../cfg.php';
```

## sleep
```
sleep(1);//pausa de 1 segundo
usleep(1);//pausa de 1 milisegundo
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
