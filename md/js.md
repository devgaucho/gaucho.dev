## argumentos (cli)

```
let numeroDoArgumento=2;
console.log('argumento '+numeroDoArgumento+' = '+process.argv[numeroDoArgumento]);
```

## baixar html

```
fetch('/arquivo.html')
.then((response) => {
	return response.text();
})
.then((html) => {
	processarAResposta(html);
});
```


## constantes e variáveis

### const

- Nível de escopo: bloco
- Rescrita de valor: não
- Valor inicial como undefined: não

### let

- Nível de escopo: bloco 
- Rescrita de valor: sim
- Valor inicial como undefined: não

### var

- Nível de escopo: função
- Rescrita de valor: sim
- Valor inicial como undefined: sim

## escopos

### escopo de bloco

a variável só acessível em um bloco igual ou inferior ao bloco onde é chamada

### escopo de função

a variável é acessível em toda a função onde é chamada pois ela é içada (hoisted) para cima

## getJson (com fetch)
```
fetch('arquivo.json')
.then(response => response.json())
.then(data => console.log(data))
.catch(() => alert('erro'));
```

## getJson (com XMLHttpRequest)
```
var request = new XMLHttpRequest();
request.open('GET','arquivo.json',true);
request.onload=function() {
	if (this.status >= 200 && this.status < 400) {
		var data = JSON.parse(this.response);
		console.log(data);
	}else{
		alert('erro');
	}
};
request.send();
```

## historico (ler propriedade do estado)

```
history.state.<nome da propriedade>
```

## node v20.x

```
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash
nvm install 20
```

Fonte: [Node.js](https://nodejs.org/en/download/package-manager)

## operadores binários

```
if(a && b){
	alert("a AND b");
}
if(a || b){
	alert("a OR B");
}
```

Fonte: [MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators#binary_logical_operators)

## promise

```
let minhaPromise = new Promise(function(resolve, reject) {
    let operacao = true; // Simula uma operação que pode ser bem-sucedida ou falhar

    setTimeout(function() {
        if (operacao) {
            resolve('Operação bem-sucedida!');
        } else {
            reject('Operação falhou!');
        }
    }, 1000);
});

minhaPromise
    .then(function(value) {
        console.log(value); // Será executado se a operação for bem-sucedida
    })
    .catch(function(error) {
        console.log(error); // Será executado se a operação falhar
    });
```

## stdin

```
let input='';
process.stdin.on('data',(chunk)=>{
	input+=chunk.toString();
});
process.stdin.on('end',()=>{
	console.log(input.trim());
});
```

## undefined

variáveis do tipo let não podem ser usadas antes antes de serem declaradas, elas precisam ser declaradas em alguma linha anterior ao seu uso

Fonte: [Stack Overflow](https://stackoverflow.com/a/56474873)

## voltar

```
history.back();
```
