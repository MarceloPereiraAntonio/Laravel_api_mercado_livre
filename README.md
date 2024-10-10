
### Passo a passo para rodar esse projeto
Clone Repositório
```sh
git clone -b https://github.com/MarceloPereiraAntonio/Laravel_api_mercado_livre.git
```
```sh
cd name your project
```

Crie o Arquivo .env
```sh

cp .env.example .env
```
Atualize essas variáveis de ambiente no arquivo .env
```dosini

APP_NAME="New project"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=youruser
DB_PASSWORD=yourpassword

# Variáveis para configuração da API do Mercado Livre

# ID da aplicao criada 
ID_APP_MELI=
URI_REDIRECT=
CLIENT_SECRET=
CODE_ID=

```
Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)

