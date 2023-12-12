## git

### .gitignore

```
/.env
*.swp
/db
/public/test*.php
/todo.txt
/vendor
```

## make

### make install

```
LESS=/usr/bin/lessc
PHP=/usr/bin/php
UGLIFY=/usr/bin/uglifyjs.terser

install: bin/mig.php less/style.less
	clear
	composer install
	composer dump-autoload
	$(PHP) bin/mig.php
	$(LESS) less/style.less public/css/style.css --clean-css
	$(UGLIFY) js/script.js --output public/js/script.js --compress
	echo "pronto!"
```

## parallel

### rodando dois comandos em paralelo

```
parallel --gnu << 'EOF'
date >> out1 && sleep 5
date >> out2 && sleep 5
EOF
```

Fonte: [StackOverwlow](https://stackoverflow.com/a/33765906)

### rodando comandos em paralelo com argumentos

```
date && parallel sleep ::: 5 5 5 5 5 5 5 5 && date
```

Tempo para rodar o comando acima:

- 1 core = 40s
- 2 core = 20s
- 4 core = 10s
- 8 core = 5s

## zip

### zipar um diretório

```
zip -r nomeDoZip.zip nomeDoDiretorio
```

### extrair arquivos do zip

```
unzip nomeDoZip.zip
```
