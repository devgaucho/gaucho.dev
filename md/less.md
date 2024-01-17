## compilar

```
lessc -x less/style.less public/css/style.css
```

## import

```
@import 'variables.less';
@import 'inc/1k.less';
```

## instalar (ubuntu)

```
sudo apt install -y node-less node-less-plugin-clean-css
```

## variáveis

```
@corDoTexto: black;

body{
	color:@corDoTexto;
}
```
