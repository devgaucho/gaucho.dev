## código de resposta (http)
```
http_response_code($codigoInt);
```

## escrever dados em um arquivo com append
```
file_put_contents('nome do arquivo',$dados,FILE_APPEND);
```
Fonte: [PHP](https://www.php.net/manual/en/function.file-put-contents#example-2224)

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