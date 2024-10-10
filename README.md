## Passo a passo para rodar esse projeto
Como iremos usar a API do Mercado livre você precisa criar uma conta na plataforma caso ainda não tenha:
Acesse https://www.mercadolivre.com.br/

Feito a sua conta você vai precisar acessar o proximo link para criar suas aplicações com o Mercado Livre:
https://developers.mercadolivre.com.br/devcenter
![apps](https://github.com/user-attachments/assets/99b0887e-08a3-41f5-9eeb-45b26d1c50d3)

Após criar a sua aplicação juntamente de suas credencias rode esse link para gerar o seu CODE do Mercado livre:
https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=ID_DA_SUA_APLICACAO&redirect_uri=URL_DE_REDIRECIONAMENTO
Quando rodar esse link você será direcionado para dar permissão a sua nova aplicação conforme a imagem:
![Captura de tela de 2024-10-09 22-52-34](https://github.com/user-attachments/assets/8fbc512f-8ba5-486e-96c5-a408f11e0f69)

Feito isso aguarde suas chaves para usarmos posteriormente 
client_id;
client_secret;
redirect_uri;
code;

### Agora vamos ao projeto!

Clone o Repositório
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
Atualize essas variáveis de ambiente no seu arquivo .env
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



