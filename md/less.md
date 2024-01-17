## compilar

```
lessc --clean-css less/style.less public/css/style.css
```

## import

```
@import 'variables.less';
@import 'inc/1k.less';
```

Fonte: [Less](https://lesscss.org/features/#import-atrules-feature)

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
