## conexão mysql

```
use Medoo\Medoo;
$db=new Medoo([
	'type'=>'mysql',
	'host'=>'localhost',
	'database'=>$_ENV['MYSQL_DB'],
	'username'=>$_ENV['MYSQL_USER'],
	'password'=>$_ENV['MYSL_PASSWORD'],
	'charset'=>'utf8mb4',
	'collation'=>'utf8mb4_unicode_ci',
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
