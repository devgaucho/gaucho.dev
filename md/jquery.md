## cdn
```
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
```

Fonte: [cdnjs](https://cdnjs.com/libraries/jquery/1.12.4)

## getJSON
```
$.getJSON("arquivo.json",function(data){...});
```

Fonte: [jQuery](https://api.jquery.com/jQuery.getJSON)

## plugin

```
// Definindo o plugin jQuery
(function($) {
    $.fn.mostrarAlerta = function(mensagem) {
        return this.each(function() {
            $(this).on('click', function() {
                alert(mensagem);
            });
        });
    };
})(jQuery);

// Usando o plugin
$(document).ready(function() {
    $('#idDoBotao').mostrarAlerta('Esta é a mensagem de alerta.');
});
```
