## Instalar dependencias 
composer install --ignore-platform-reqs

## é necessario criar o arquivo .env vc pega as informações do .env.exemplo

# Sail

## para roda o progama pelo sail é  necessario ter o docker e docker composer instalado
## roda comando do sail para criar as imagens e containers
./vendor/bin/sail up

## roda as migrate 
./vendor/bin/sail artisan migrate


# Rotas 
   [GET] /api (Rotas de teste da api)  
   [GET]  /campanhas (Listar todas as campanhas)
   [POST] /campanhas (Criar nova campanha)
   [GET]  /campanhas-produto/{produto} (Listar todas as campanhas de um produto)
   [GET]  /campanhas/{campanha} (pegar uma campanha)
   [PUT]  /campanhas/{campanha} (Altera uma campanha)
   [DELETE]/campanhas/{campanha} 
   [GET] /cidades (Listar todas as cidades)
   [POST]/cidades (Criar uma nova cidade)
   [GET] /cidades/{cidade} (Pegar uma cidade)
   [PUT] /cidades/{cidade} (altera uma cidade)
   [DELETE]/cidades/{cidade} (Deletar uma cidade)
   [GET]   /grupos (Listar todos os grupos)
   [POST]  /grupos (Criar um novo crupo)
   [GET]   /grupos/{grupo}(Buscar um grupo pelo id)
   [PUT]   /grupos/{grupo}(Alterar um grupo)
   [DELETE]/grupos/{grupo}(Deletar um grupo)
   [GET]   /produtos (Listar todos os Produtos) 
   [POST]  /produtos (Criar um novo Produto)
   [GET]   /produtos/{produto} (Buscar um produto pelo id)
   [PUT]   /produtos/{produto} (Alterar um produto)
   [DELETE] /produtos/{produto} (Deletar um Produto)
   [POST]   /vincular-produtos/{campanha}/{produto} (Vincular um Produto a uma campanha)
