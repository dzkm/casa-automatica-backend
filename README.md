<h1>Casa automática backend </h1> 


> Status do Projeto: em desenvolvimento

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)

... 

Insira os tópicos do README em links para facilitar a navegação do leitor

## Descrição do projeto 

<p align="justify">
  Trabalho desenvolvido pelos alunos do IFSC Campus São Lourenço do Oeste que consiste na implementação do backend para comunicação do frontend com o Arduino.
</p>

## Funcionalidades

:heavy_check_mark: Listagem dos cômodos

:heavy_check_mark: Dispositivos (obter/cadastrar/atualizar/excluir)

## Layout ou Deploy da Aplicação :dash:

> Link do deploy da aplicação. Exemplo com netlify: https://certificates-for-everyone-womakerscode.netlify.app/

... 

Se ainda não houver deploy, insira capturas de tela da aplicação ou gifs

## Pré-requisitos

:warning: [Docker](https://www.docker.com/)
:warning: [PHP](https://www.php.net/)
:warning: [Composer](https://getcomposer.org/)

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
git clone (https://github.com/dzkm/casa-automatica-backend)
```

Coloque um passo a passo para rodar a sua aplicação. **Dica: clone o próprio projeto e verfique se o passo a passo funciona**


## JSON :floppy_disk:

### Rota para comodos:
GET /rooms -> obtem todos os cômodos
GET /rooms/all -> obtem todos os cômodos (inclusive os deletados) 
GET /rooms/{id} -> obtem um comodo específico
POST /rooms -> cria um comodo
PUT /rooms/{id} -> atualiza um comodo
DELETE /rooms/{id} -> apaga um comodo específico

Se quiser, coloque uma amostra do banco de dados 

## Iniciando/Configurando banco de dados

Se for necessário configurar algo antes de iniciar o banco de dados insira os comandos a serem executados 

## Linguagens, dependencias e libs utilizadas :books:

- [PHP](https://www.php.net/)

...

Liste as tecnologias utilizadas no projeto que **não** forem reconhecidas pelo Github 

## Desenvolvedores/Contribuintes :octocat:

Liste o time responsável pelo desenvolvimento do projeto

- [Djonathan](https://github.com/dzkm)
- [Monike](https://github.com/monike29)
- [Fernando](https://github.com/fernando-ao)
| :---: | :---: | :---: 

## Licença 

The [MIT License]() (MIT)

Copyright :copyright:2023 - Casa automática backend
