<p align="center"><a href="https://laravel.com" target="_blank">
<img src="./resources/images/default-thumbnail1.png"></a></p>
<h1 align="center">Paloma Gerenciamento de Rebanho Bovino API</h1>

## É o olho do dono que engorda o gado! 

<p>Gerencie seu rebanho de maneira eficiente com o controle total. Simpes e fácil de usar</p>
<p>
O sistema ainda está em desenvolvimento, então se sinta a vontade para criar uma issue, um fork ou pull request. Viva o mundo opensource!
</p>

## Frontend

Disponível em desenvolvimento.

## Setup

### 1. Antes de começarmos é importante que seu ambiente atenda os seguintes requisitos:

### **DOCKER**
##### Gerenciador de containers
- [Instalação](https://docs.docker.com/engine/install/)
- `version 27.1^`

### **DOCKER COMPOSE**:
- [Instalação](https://docs.docker.com/compose/)
- `version 2.29.1^`

### Buildando o container

```bash
# docker-compose
bash docker-compose up -d --build
``` 

## Preparando as variáveis de ambiente
```bash
# copiar o .env
cp .env.example .env
```

## Instalando as dependências
Entre na bash do container com
```bash
docker exec -it paloma-php-fpm-1 bash
```

Instalar as dependencias do composer
```bash
# composer
composer install
```

## Gerando a key da aplicação
Gere a chave da aplicação com o comando:
```bash
# artisan
php artisan key:generate
```

## Configurando o banco de dados no arquivo `.env`
Configure seu banco de dados no arquivo `.env`
```bash
# .env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE='nome-do-seu-database'
DB_USERNAME='usuário-do-seu-database'
DB_PASSWORD='senha-do-seu-database'
```

## Migrando o banco de dados
Para migrar as tabelas e já semear alguns dados para ilustrar o uso da aplicação, bem como algumas relações entre as tabelas use:
```bash

```bash
# executar as migrations
php artisan migrate

# se quiser rodar as seeders
php artisan migrate --seeders

# para limpar o cache:
php artisan config:cache

# para listar as rotas utilizadas:
php artisan route:list
```

## Rodando o servidor

o servidor deve iniciar na url `http://localhost:8081`:

## Importando Endpoints no Insomnia

Para importar a coleção de endpoints no Insomnia, siga os passos abaixo:

1. A colection de endpoints se encontra na raiz do projeto, em `endpoints/Insomnia_endpoints_doc.json`.
2. No Insomnia, clique em `Import/Export` (ícone no canto superior direito).
3. Selecione `Import Data` e, em seguida, `From File`.
4. Escolha o arquivo `endpoints/paloma_insomnia_collection.json` na raiz do projeto.

Após a importação, você verá todos os endpoints disponíveis para teste.


## License

The Laravel framework is open-sourced software licensed under the [GPL](LICENSE.md).
