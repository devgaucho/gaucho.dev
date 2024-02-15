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
