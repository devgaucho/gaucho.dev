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

## percentage (fix)

Por alguma razão esse código não funciona corretamente no lessc >=4.*:

```
@fluidGridColumnWidth:    percentage(@gridColumnWidth/@gridRowWidth);
```

Mas esse código funciona:

```
@fluidGridColumnWidth: (@gridColumnWidth / @gridRowWidth) * 100%;
```

## variáveis

```
@corDoTexto: black;

body{
	color:@corDoTexto;
}
```
