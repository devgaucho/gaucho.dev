## trim de urls

remove barras, cerquilhas e espaços do final do link

```
rtrim($link,' #/')
```

## validação de urls

validação de urls do @grub

```
preg_match('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS',$link)
```

Fonte: [mathiasbynens.be](https://mathiasbynens.be/demo/url-regex)

