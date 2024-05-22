> A palavra "zen" vem do termo sânscrito dhyāna, que denota o estado de concentração típico da prática meditativa

## Regras:

1. bibliotecas que rodam sózinhas são melhores que frameworks
2. evite a repetição de códigos e as classes gigantes (D.R.Y.)
3. evite encadeamentos (chaining) e métodos em cascata (cascading)
4. mantenha as coisas simples, não tente reinventar a roda
5. nada de código inline ou incorporado²
6. use POO sempre que possível, mas não mais que o necessário

## Estilo de código:

1. evite deixar linhas em branco
2. evite usar caracteres não alfanuméricos além do underscore (0x5F)
3. evite usar espaços antes e depois de caracteres não alfanuméricos
4. no máximo 70 caracteres por linha
5. use o estilo de indentação K&R¹ com tab (0x09) no tamanho 8

### Notas

#### 1) Tipos de indentação:

- K&R: Também conhecido como Linux (ótimo pois ocupa menos linhas)
- BSD: Também conhecido como Allman, GNU e PEAR (padrão do PHPStorm 9)
- Whitesmiths: Também conhecido como Haskell

![Tipos de indentação](img/indentation.jpg)

#### 2) Exemplos de código inline ou incorporado:

- atributo `style`
- função arrow (vai contra a regra 4)
- operador ternário (vai contra a regra 4)
- `<script>`
- `<style>`
- vários métodos na mesma linha (vai contra as regras 3 e 4)

