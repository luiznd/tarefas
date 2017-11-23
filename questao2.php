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