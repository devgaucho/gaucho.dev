## acesso negado a arquivos e diretórios

```
RewriteRule ^(composer\.json) - [F,L]
RewriteRule ^(composer\.lock) - [F,L]
RewriteRule ^vendor/ - [F,L]
RewriteRule ^.git/ - [F,L]
```

## rewrite (.htaccess)

```
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
ErrorDocument 403 /index.php
```

## utf-8 (.htaccess)

```
AddDefaultCharset UTF-8
```
