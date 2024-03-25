## urls

validação de urls do @grub

```
preg_match('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS',$link)
```

Fonte: [mathiasbynens.be](https://mathiasbynens.be/demo/url-regex)

## trim de urls

remove caracteres estranhos de links

```
trim($link,'!"#$%&\'()*+,-./@:;<=>[\\]^_`{|}~')
```

Fonte: [mathiasbynens.be](https://mathiasbynens.be/demo/url-regex)
