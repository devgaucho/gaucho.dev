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

a variável é acessível em toda a função onde é chamada poi ela é içada (hoisted)

## getJson
### com fetch
```
fetch('arquivo.json')
.then(response => response.json())
.then(data => console.log(data))
.catch(() => alert('erro'));
```
### com XMLHttpRequest
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

## undefined

variáveis do tipo let não podem ser usadas antes antes de serem declaradas, elas precisam ser declaradas em alguma linha anterior ao seu uso

Fonte: [Stack Overflow](https://stackoverflow.com/a/56474873)
