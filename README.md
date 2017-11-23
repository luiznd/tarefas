QUESTÃO 1
=======================

programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
de ambos (3 e 5), imprima “FizzBuzz”:

<?php
  for($i=1; $i<=100; $i++) {
  if( $i%3 == 0 ) echo "Fizz";
  if( $i%5 == 0 ) echo "Buzz";
  if( ($i%3 != 0) and ($i%5 != 0) ) echo $i;
  echo "<br />";
  } 
?>

QUESTÃO 2
=======================



 <?php
 session_start();
 if (!$_COOKIE['Loggedin']){
     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
         setcookie("Loggedin", $_SESSION['loggedin'], time()+3600);
     }    
 }
 if (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
   header("Location: http://www.google.com");
   exit();
 }



QUESTÃO 3
=======================
 
 
 <?php

 class MyUserClass
 {
   private static $instancia;
   public function getUserList()
   {
     $instanciaConexaoPdoAtiva = $this->getInstancia();
     $sqlStmt = 'select name from user';
     $listaUsuarios = array ();
         try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->execute();
            while($row = $operacao->fetch(PDO::FETCH_OBJ)){
              array_push($listaUsuarios, $row);
            }   
            return $listaUsuarios;
         } catch( PDOException $excecao ){
            echo $excecao->getMessage();
         }
  
  }
  public function getInstancia() {
      if(!isset(self::$instancia)) {
           try {
               $dsn = "localhost;dbname=local";
               $usuario = "user";
               $senha = "password"; // Preencha aqui com a senha do seu servidor de banco de dados.
  
               // Instânciado um novo objeto PDO informando o DSN e parâmetros de Array
               self::$instancia = new PDO( $dsn, $usuario, $senha );
  
               // Gerando um excessão do tipo PDOException com o código de erro
               self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  
           } catch ( PDOException $excecao ){
               echo $excecao->getMessage();
               // Encerra aplicativo
               exit();
           }
       }
       return self::$instancia;
  } 
 }






QUESTÃO 4
=======================

# Cadastro de Tarefas


Projeto de cadastro de tarefas utilizando o Zendframework2 PHP com persistência Doctrine, base de dados Mysql, Bootstrap e etc..

Foco do projeto - > Listagem, Inclusão, Edição e Exclusão de Tarefas.

Pasta dos sources do projeto module/Application 


# Listagem de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
View - > module/Application/view/application/index/index.phtml

# Adição de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
View - > module/Application/view/application/index/adicionar.phtml

# Edição de Tarefas 
Controller - > module/Application/src/Application/Controller/IndexController.php
View - > module/Application/view/application/index/editar.phtml

# Para instalação da tabela de Tarefas executar o script tarefas.sql
Configuração de acesso ao mysql
Doctrine - > /config/autoload/doctrine_orm.local.php
