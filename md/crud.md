![crud e rest](img/crud.png)

## curl

### create

```
curl -X POST example.com
```

### create (com payload)

```
curl -X POST -H "Content-Type: application/json" -d "{\"msg\": \"hello world\"}" example.com
```

### read

```
curl -X GET example.com
```

### update

```
curl -X PUT example.com
```

### update (com payload)

```
curl -X PUT -H "Content-Type: application/json" -d "{\"msg\": \"ola mundo\"}" example.com
```

usando um arquivo como payload:

```
curl -X PUT -d @nomeDoArquivo example.com
```

### delete

```
curl -X DELETE example.com
```

Fontes:

- [CodeJava](https://www.codejava.net/rest-api/curl-for-testing-crud-rest-apis)
- [Terminal Cheat Sheet](https://terminalcheatsheet.com/pt-BR/guides/curl-rest-api)

