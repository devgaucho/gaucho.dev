## Boas práticas do DBA

## 1. Normalização e Denormalização:

- Normalize o banco de dados para evitar redundância e garantir a integridade dos dados.
- Utilize a denormalização controlada (tabelas com dados agrupados) para otimizar o desempenho (evitando joins) em casos específicos, com cuidado para manter a integridade.

## 2. Escolha Adequada de Tipos de Dados e Índices:

- Utilize tipos de dados que se alinhem com o conteúdo dos campos para otimizar o espaço de armazenamento.
- Crie índices para colunas frequentemente usadas em consultas, mas evite o uso excessivo para não impactar o desempenho de escrita.

## 3. Chaves Primárias e Estrangeiras, e Valores Padrão:

- Utilize chaves primárias para identificar cada linha e chaves estrangeiras para manter a integridade referencial (impede a inserção de chaves inválidas).
- Use valores padrão em vez de NULL sempre que possível.

## 4. Escalabilidade, Segurança e Backup:

- Projete o banco de dados para escalabilidade, considerando o crescimento futuro de dados e carga.
- Implemente boas práticas de segurança, como controle de acesso, criptografia e auditoria de dados.
- Crie um plano robusto de backup e recuperação para evitar perda de dados.

## 5. Manutenção Regular, Padronização e Documentação:

- Realize manutenções regulares, como otimização de índices e atualizações estatísticas.
- Utilize uma convenção de nomenclatura consistente (tabelas com nome no plural e colunas em snake_case) para facilitar a manutenção.
- Documente o esquema (estrutura) do banco de dados, relacionamentos, regras de negócios e outros aspectos cruciais.

Fonte: Gemini 1.5 (12mar2024)

## Configurar o MySQL (~/.my.cfg)

```
[client]
default-character-set=utf8mb4

[mysql]
default-character-set=utf8mb4

[mysqld]
collation-server=utf8mb4_unicode_ci
init-connect='SET NAMES utf8mb4'
character-set-server=utf8mb4
```

## Criar banco de dados (mysql)
```
CREATE DATABASE banco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
