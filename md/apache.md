## .htaccess básico

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

# erros
ErrorDocument 403 /index.php
ErrorDocument 404 /index.php

# charset
AddCharset utf-8 .css .html .js .json .md .txt .wat

# mimes
AddType application/wasm .wasm
AddType text/plain .wat

# bloqueios
RedirectMatch 404 /\.git
```
