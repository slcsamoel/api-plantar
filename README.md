## Instalar dependencias 
composer install --ignore-platform-reqs

## é necessario criar o arquivo .env vc pega as informações do .env.exemplo

# Sail

## para roda o progama pelo sail é  necessario ter o docker e docker composer instalado
## roda comando do sail para criar as imagens e containers
./vendor/bin/sail up

## roda as migrate 
./vendor/bin/sail artisan migrate

