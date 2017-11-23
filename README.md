Questões 1 a 3
=======================

diretório raiz, arquivo : questao1.php, questao2.php, questao3.php

Sistema de Tarefas - Questão 4
=======================

### Cadastro de Tarefas


Projeto de cadastro de tarefas utilizando o Zendframework2 PHP com persistência Doctrine, base de dados Mysql, Bootstrap e etc..
<br>
<p>Foco do projeto - > Listagem, Inclusão, Edição e Exclusão de Tarefas.</p> 

### Instalação
Criar o diretório tarefa e copiar todas as pastas e arquivos.
<p>Pasta dos sources do projeto module/Application</p> 

### Para instalação da tabela de Tarefas executar o script tarefas.sql em um schema criado
Configuração de acesso ao mysql:
<p>Doctrine - > /config/autoload/doctrine_orm.local.php</p>

### Listagem de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
<p>View - > module/Application/view/application/index/index.phtml</p>

### Adição de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
<p>View - > module/Application/view/application/index/adicionar.phtml</p>

### Edição de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
<p>View - > module/Application/view/application/index/editar.phtml</p>


