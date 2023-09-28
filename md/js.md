## constantes e variáveis

### const

- Nível de escopo: bloco igual ou inferior ao bloco onde é chamada
- Rescrita de valor: não
- Valor inicial como undefined: não

### let

- Nível de escopo: bloco igual ou inferior ao bloco onde é chamada
- Rescrita de valor: sim
- Valor inicial como undefined: não (a variável precisa ser definida em uma linha anterior ao uso dela)

### var

- Nível de escopo: toda a função onde é chamada (global e hoisted)
- Rescrita de valor: sim
- Valor inicial como undefined: sim

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

Fonte: [Stack Overflow](https://stackoverflow.com/a/56474873)
