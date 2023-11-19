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

### index.php (public)

```
<?php
require __DIR__.'/../index.php';
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

## user-agent
```
$str=$_SERVER['HTTP_USER_AGENT'];
```
