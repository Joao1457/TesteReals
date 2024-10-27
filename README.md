<center>

# Teste de Desenvolvimento - Reals

</center>

## Tabela de conteúdos

- [Sobre o projeto](#sobre)
- [Instalação](#instalação)
  - [Pré-Requisitos](#pré-requisitos)
- [Estrutura de pastas](#estrutura-de-pastas)



## Sobre

Este é um projeto realizado para uma vaga como desenvolvedor fullstack PHP, onde foi requisitado uma aplicação web para gerenciar usuario, afiliados e comissões .

## Instalação

### Pré-Requisitos

```
PHP 8.2.23 
Node 20.17
Vite
MySQL
Bootstrap

```

Primeiramente faça um clone do projeto no github - https://github.com/Joao1457/TesteReals:

```bash
git clone https://github.com/Joao1457/TesteReals

#Em Seguida entre na pasta clonada:

cd TesteReals
```
Rode o comando para atualizar as dependencias do projeto:

```bash
composer update
```
crie uma copia do .env.example  e depois rode o php artisan key:generate para definir o .env:

```bash
copy .env.example .env

php artisan key:generate
```

No .env modifique para se adequar ao padrao do projeto e configure os dados de acesso do banco:

```bash

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testereals
DB_USERNAME=root
DB_PASSWORD=senhadoDB
```
Apos isso siga a sequencia de comandos para iniciar o projeto:

```bash
php artisan migrate
   WARN  The database 'testereals' does not exist on the 'mysql' connection.

  Would you like to create it? (yes/no) [yes]
❯ yes

#> Obs: Ao rodar as migrations ele perguntará se você deseja criar o database 'testereals' pois ele não existe ainda.

npm install #Para instalar os pacotes do node


npm run dev #Para fazer build das dependências


php artisan serve #Em outro terminal rode o PHP artisan serve

```
> Obs: o projeto do backend possui dependências do Node

Depois de seguir esse processo rode os seeds

```bash

# carregar os seeds( Faça na ordem Estado e depois Cidade)
php artisan db:seed EstadoSeeder

php artisan db:seed CidadeSeeder

```

## Estrutura de pastas

Listagem dos principais arquivos e pastas do projeto.

```
📦
┣ 📂 app -> pasta principal do sistema
┠━📂 database -> contém os seeders,factories e as migrations
┠━📂 Resources -> contém os arquivos principais do domínio da aplicação
┃ ┠━━━━ 📂 Views -> contém os arquivos voltados para o front
┣ 📂 routes -> roteamento da aplicação

```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
