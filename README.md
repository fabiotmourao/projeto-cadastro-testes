# Projeto de Cadastro de Usuários

Este é um projeto simples de cadastro de usuários, desenvolvido utilizando as seguintes tecnologias:

- **Versões Utilizadas**:
  - PHP: 7.4.3
  - HTML: 5
  - CSS (com Bootstrap): 4
  - MySQL: 5.7.31

## Configuração do Banco de Dados

1. Certifique-se de ter o MySQL instalado e em execução em sua máquina.
2. Crie um banco de dados chamado `sua_db_basede_dados`.
3. Configure o arquivo `db_connection/connection.php` com as informações de conexão com o banco de dados:

```php
$servername = "localhost";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "sua_db_basede_dados";
```

## Executando o Projeto

1. Certifique-se de ter um ambiente de desenvolvimento configurado com suporte a PHP, um servidor web (por exemplo, Apache), e MySQL.

2. Clone ou faça o download deste repositório para o seu ambiente local.

3. Configure o arquivo `db_connection/connection.php` com as informações corretas de conexão com o banco de dados, como explicado acima.

4. Abra o terminal ou prompt de comando e navegue até o diretório raiz do projeto.

5. Execute o comando `php -S localhost:8000` para iniciar um servidor PHP local. Isso tornará o projeto acessível em `http://localhost:8000`.

6. Abra o navegador e acesse `http://localhost:8000/` para iniciar o registro dos usuários.

7. Os supervisores podem fazer login na página `http://localhost:8000/login.php` para acessar o painel de controle `dashboard.php` e ver os usuários cadastrados.

## Contribuição

Sinta-se à vontade para contribuir para este projeto ou fazer melhorias. Você pode criar pull requests para adicionar novos recursos ou resolver problemas existentes.

## Licença

Este projeto está sob a Licença MIT. Consulte o arquivo [LICENSE](LICENSE) para obter detalhes.

