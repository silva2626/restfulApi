# API Simples para estudo com SPA's

### Esse projeto consiste em uma simples API, para ultilizar de base no estudo de Single Page Applications.

## Características 
- Padrão RESTful
- CRUD de Cursos

## Como Usar

1. Clone o Repositório

```
git clone https://github.com/silva2626/restfulApi.git
```
2. Crie o banco de dados Sqlite.
```
touch database.sqlite
```
3. Abra o banco de dados com o programa de sua preferência e execute a Query: **CoursesSchema.sql** que está na raiz do projeto, para criar a tabela de Cursos.

4. Por fim abra o terminal e execute o comando abaixo para iníciar o servidor PHP.
```
composer server
```

## Rotas
- GET /courses : Listas todos os registros.
- GET /courses?query=suaPesquisa : Retorna lista de registro compativeis com a pesquisa.

- GET /courses/ID : Retorna o registro do respectivo ID.
- POST /courses : Cria um novo curso.
- PUT /courses/ID : Edita o registro do respectivo ID.
- DELETE /courses/ID : Deleta o registro do respectivo ID.

## Estrutura do corpo da requisição para a criação ou Edição do registro.

- name
- teacher
- duration
- rating
- price

