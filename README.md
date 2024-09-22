## Estudo de PHP LARAVEL

## Nesse projeto, é utilizado laravel.php7.4.6 mysql8.0.2

### Projeto para estudar php através do laravel, criado um mini sistema com area publica e area de administrador para criar produt, detalhe do produto, cadastrar, editar excluir e consultar. Tratando com o passar do tempo e ajustando melhores formas de escrever o código, mantendo algumas anotações. 

-  Routes - Envio de parametro, parametro opcional e default, tratamento de rota com expressao regular, redirecionamento e fallback.
-  Controllers - enviando parametro para rota pelo controller, envio de parametro da controller para view.
-  Blade - @extends, section, yield, include, token @csrf, @method(), compoments(envio de parametro para components).
-  Models - migrations, relacionamentos.
-  Seeders/Eloquent/Tinker
-  Gravação de dados no Banco de dados, repopulando inputs com metodo old().
-  Add Factory/ Middlewares
-  Resources


### pode baixar o projeto e rodar com diretamente no terminal do vsCode pelo comando: 
- dentro do mysql cria uma database: create database sg;
- use sg;
- php artisan serve (para iniciar o servidor php)
- execute as migrations: php artisan migrate (para criara as tabelas do banco e suas relações)
- execute as seeders: php artisan db:seed (para popular o banco)

