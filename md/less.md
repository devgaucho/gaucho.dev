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
npm install less less-plugin-clean-css -g
```

Fonte: [Less](https://lesscss.org/usage/)

## variáveis

```
@corDoTexto: black;

body{
	color:@corDoTexto;
}
```
