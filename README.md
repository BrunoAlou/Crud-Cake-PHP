# Desafio Loginfo - Crud em CakePHP

Necessidades do projeto:

- Construir uma aplicação web com CakePHP (versão 3.9).
- Deve ser permitindo o usuário fazer o CRUD completo via sistema.
- O mesmo deve possuir uma tela de acesso para cada tabela disponibilizada.

Mais sobre as ferramentas utilizadas no projeto:

- [Git](https://git-scm.com/)
- [GitHub](https://github.com/)
- [PHP7.4](https://www.php.net/)
- [Jquery](https://jquery.com/)
- [CakePHP](https://cakephp.org/)
- [Bootstrap](https://getbootstrap.com/)
- [Jquery Mask](https://igorescobar.github.io/jQuery-Mask-Plugin/)
- [Composer](https://getcomposer.org/)
- [Mysql](https://www.mysql.com/)

### Estrutura do Projeto

```
|- config/
|   |
|   |- Migrations/                       // Contem arquivos para criação do banco
|   |- Seeds/                            // Contem arquivos para preenchimento de dados do banco
|- src/
|   |
|   |- controller/                       // Contem controlers do projeto
|   |- Middleware/                       // Contem Middleware para tratamento de rotas inexistentes
|   |- Model/                            // Contem models do projeto
|   |- View/                             // Service business logic classes (UserService)
|- Templates/
|   |- element                           // Elementos reutilizados no projeto
|   |- ...Templates especificos          // Contem templates especificos referente a cada Table
|- Database.sql                          // exemplo de banco utilizado
```



### Comandos para executar o projeto local
# Clone este repositório
$ git clone git@github.com:BrunoAlou/loginfo.git



##### Pre Requisitos

- PHP 
- Mysql
- Composer

**Note:** As seguintes tecnologias devem estar instaladas em seu ambiente local para rodar o projeto.

#### Comandos para executar o projeto local

Realize a criacao de um banco local de nome loginfo no mysql

configure o arquivo app/config/app.php com as configuracoes de seu mysql local
```
'password' => 'senha_banco',
```            
modifique a linha acima

Rode os comandos abaixo em sequência a partir da pasta raiz do projeto:

```
$ cd app
$ composer intall
$ bin/cake migrations migrate 
$ bin/cake migrations seed
$ bin/cake server
```

### URLs 

#### HTML

|HTTP Method|URL|Description|
|---|---|---|
|`GET`|http://localhost/ | Home |
|`GET`|http://localhost/Pessoas | Listagem de Pessoas |
|`GET`|http://localhost/Itens | Listagem de Itens |
|`GET`|http://localhost/Vendas | Listagem de Vendas |
|`GET`|http://localhost/itens-venda | Listagem de itens da Venda |

## Autor

<a href="https://www.linkedin.com/in/brunoalou/" target=”_blank”>
 <sub><b>Bruno Alves</b></sub></a> <a href="https://www.linkedin.com/in/brunoalou/" title="LinkedIn"></a>
 <br />
 
[![Gmail Badge](https://img.shields.io/badge/-bruunieng@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:bruunieng@gmail.com)](mailto:bruunieng@gmail.com)

---
