## cdn

```
<script src="https://unpkg.com/mustache"></script>
```

## uso básico (javascript)

```
function renderTemplate(templateId, data) {
    var template = $('#' + templateId).html();
    var rendered=Mustache.render(template, data);
    $('#root').html(rendered);
}
```