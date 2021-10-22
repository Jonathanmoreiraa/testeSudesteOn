# testeSudesteOn
Projeto criado para o teste prático da Sudeste Online.

#### Instalação do banco de dados

Primeiramente, acessar o script ```sudesteonline.sql``` e copiar os dados.

Ir no phpmyadmin e importar os dados, isso pode ser feito tanto pelo próprio arquivo, quanto por script, para isso basta abrir esse arquivo, copiar seu conteúdo e colar na seção SQL (phpmyadmin).

#### Configuração do projeto

Feito isso, é preciso renomear o arquivo ```app.default.php``` para ```app.php```.

Por fim, é só preciso mudar as informações do banco para que acesse os dados, onde:

* Acessar o arquivo ```app.php```
* 'username'=>'nome-banco'
* 'password'=>'senha' ou 'password'=>'' (caso o banco não tenha senha).
* 'database'=>'sudesteonline'
