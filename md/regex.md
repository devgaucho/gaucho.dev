## trim de urls

remove barras, cerquilhas e espaços do começo e do final do link

```
trim($link,' #/')
```

## validação de urls

validação de urls do @[grub](https://x.com/grub)

```
preg_match('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS',$link)
```

Fonte: [mathiasbynens.be](https://mathiasbynens.be/demo/url-regex)

