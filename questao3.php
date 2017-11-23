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