## cdn
```
<script src="https://unpkg.com/jquery"></script>
```

## getJSON
```
$.getJSON("arquivo.json",function(data){...});
```

Fonte: [jQuery](https://api.jquery.com/jQuery.getJSON)

## parser de html (com hack)

```
function pegarFragmento(htmlStr,selStr){
	var $html = $('<div>'+htmlStr+'</div>');
	var conteudoDaDiv = $html.find(selStr).html();
	return conteudoDaDiv;	
}
```

## plugin

```
(function($) {
    $.fn.mostrarAlerta = function(mensagem) {
        return this.each(function() {
            $(this).on('click', function() {
                alert(mensagem);
            });
        });
    };
})(jQuery);

$(document).ready(function() {
    $('#idDoBotao').mostrarAlerta('Esta é a mensagem de alerta.');
});
```
