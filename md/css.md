## capitalizar

```
h1::first-letter,h2::first-letter ,h3::first-letter{
	text-transform: uppercase;
}
```

## dark mode
```
@media (prefers-color-scheme: dark){...}
```

Fonte: [MDN](https://developer.mozilla.org/pt-BR/docs/Web/CSS/@media/prefers-color-scheme)

## centralizar o conteúdo de uma div

```
div{
	display: grid;
	place-content: center;
}
```


## firefox

```
@-moz-document url-prefix() { 
  .selector {
     color: lime;
  }
}
```

Fonte: [CSS-Tricks](https://css-tricks.com/snippets/css/css-hacks-targeting-firefox/)

## fontes

### mono

```
code{
	font-family:"Courier New","Liberation Mono",Courier,monospace;
}
```

### sans

```
body{
	font-family: Arial,"Liberation Sans",Helvetica,sans-serif;
	font-size:24px;
	line-height:1.5em;
}
```

Fonte: [MIT](http://web.mit.edu/jmorzins/www/fonts.html)

## media queries
```
@media (min-width: 700px) and (orientation: landscape){...}
```

Fonte: [MDN](https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_media_queries/Using_media_queries)


## quebra de linha
```
white-space: pre-wrap;       /* Since CSS 2.1 */
white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
white-space: -pre-wrap;      /* Opera 4-6 */
white-space: -o-pre-wrap;    /* Opera 7 */
word-wrap: break-word;       /* Internet Explorer 5.5+ */
```

Fonte: [Stack Overflow](https://stackoverflow.com/a/248013)

## itcss (inverted triangle css)
- settings = variáveis (ex: fonte)
- tools = geral (ex: .center)
- generic = reset
- base = tags (ex: h1, p)
- objects = layout (ex: .container, .row)
- components = classes (ex: .header, .footer)
- trumps = importante (ex: .hide)

fonte: [anselme](https://www.anselme.com.br/2024/06/19/itcss-inverted-triangle-css/)
