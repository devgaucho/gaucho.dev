# atualizar o código
echo "atualiza o código"
git pull origin main

# instalar o composer
composer install

# executar migrations
php bin/mig.php

# criar o usuário admin
php bin/admin.php