# atualizar o código
echo "atualizando código"
git pull origin main

# executar migrations
php bin/mig.php

# criar o usuário admin
php bin/admin.php