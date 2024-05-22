1. bibliotecas que rodam sózinhas são melhores que frameworks
1. evite a repetição de códigos e as classes gigantes (D.R.Y.)
1. evite encadeamentos (chaining) e métodos em cascata (cascading)
1. mantenha as coisas simples, não tente reinventar a roda
1. nada de código inline ou incorporado²
1. use POO sempre que possível, mas não mais que o necessário

## Estilo de código:

1. evite deixar linhas em branco
1. evite usar caracteres não alfanuméricos além do underscore (0x5F)
1. evite usar espaços antes e depois de caracteres não alfanuméricos
1. no máximo 70 caracteres por linha
1. use o estilo de indentação K&R¹ com tab (0x09) no tamanho 8

### Notas

#### 1) Tipos de indentação:

- K&R: Também conhecido como Linux (ótimo pois ocupa menos linhas)
- BSD: Também conhecido como Allman, GNU e PEAR (padrão do PHPStorm 9)
- Whitesmiths: Também conhecido como Haskell

![Tipos de indentação](img/indentation.jpg)

#### 2) Exemplos de código inline ou incorporado:

- atributo `style`
- função arrow (vai contra o item 1)
- operador ternário
- `<script>`
- `<style>`
- vários métodos na mesma linha (vai contra os itens 1 e 12)

