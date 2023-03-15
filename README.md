## About The API

Esta é uma API-REST que retorna os dados em formato de JSON e também salva esses dados de temporada do clube de futebol Grêmio. 

A listagem inicia da API Retornará os seguintes dados: 

- Jogos por temporada
- Elenco por Temporada
- Detalhes do jogador
- Próximas partidas
- Detalhes gerais da temporada

## Motivação do desenvolvimento da API

Essa API foi desenvolvida com o intuito de estudar mais afundo o Framework Laravel, e também melhorar minhas skills de analise de projetos.

## Primeiros passos

1- Tenha instalado:

- PHP versão ^8.2.x
- MySql versão ^5.7.x
- Composer versão 2.1.x

2- Crie e configure um .env a partir do .env.example na raíz do projeto.

3- Para instalar e iniciar a aplicação rode os seguintes comandos:

- composer install # para instalar todas as dependências
- php artisan key:generate # para gerar a key da aplicação
- php artisan jwt:secret # para gerar a key de validação para o jwt
- php artisan migrate --seed # para subir o banco de dados e rodar seeds
- php artisan serve # para subir um servidor e conferir a aplicação rodando

4- Gestão de usuários e seus tokens de API através do Insomnia

Será necessário logar como um Usuário Administrador para operar o controle dos Tokens de API.
	Este Usuário Admin poderá criar novos usuários e lhes atribuir Tokens de API.

OBS IMPORTANTE: O token de API só será disponibilizado uma única vez no retorno da sua solicitação de criação.
