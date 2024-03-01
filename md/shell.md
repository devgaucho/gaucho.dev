## buscar arquivos

### mp4 maiores que 200M no diretório /opt

```
find /opt -type f -size +200M -name \*.mp4
```

## formatar pendrive & gravar iso (linux mint)

### formatar pendrive

```
sudo setsid mintstick -m format
```

### gravar iso

```
sudo setsid mintstick -m iso
```

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

## ler linhas específicas de um arquivo

### ler da linha 2 até a 5

```
gawk 'NR>=2 && NR<=5' arquivo.txt
```

## linhas únicas (filtrar)

```
cat in.txt | sort | uniq >> out.txt
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
date && parallel sleep ::: 1 1 1 1 1 1 1 1 1 1 && date
```

Tempo para rodar o comando acima:

- 1 core = 10s
- 2 cores = 5s
- 4 cores = 2.5s
- 8 cores = 1.25s
- 10 cores = 1s

## tar

### adicionar um diretório

```
tar -hcvf arquivo.tar diretório
```

### extrair arquivos

```
tar -xf arquivo.tar
```

## linhas únicas em 3 listas diferentes

```
sort <(cat lista1 lista2 lista3) | uniq -d
```

## tabelas de alocação (ver os nomes)

```
sudo parted --list
```

## zip

### zipar um diretório

```
zip -r nomeDoZip.zip nomeDoDiretorio
```

### extrair arquivos do zip

```
unzip nomeDoZip.zip
```
