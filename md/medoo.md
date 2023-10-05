## conexão mysql

```
use Medoo\Medoo;
$db=new Medoo([
	'type'=>'mysql',
	'host'=>'localhost',
	'database'=>'name',
	'username'=>'root',
	'password'=>'senha1234',
	'charset'=>'utf8mb4',
	'collation'=>'utf8mb4_general_ci',
	'port'=>3306
]);
```

## conexão sqlite

```
use Medoo\Medoo;
$db=new Medoo([
	'type'=>'sqlite',
	'database'=>'db/db.sqlite3'
]);
```

## instalar

```
composer require catfan/medoo
```