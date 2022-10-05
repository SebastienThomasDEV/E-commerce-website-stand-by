<?php
//Création des variablesdefine
define("SERVEUR","localhost");
define("USER","root");
define("MDP","");
define("BD","techlottery");



// gestion de la connexion  
try  
    {
        $connexion= new PDO('mysql:host='.SERVEUR.';dbname='.BD, USER, MDP);
        $connexion->exec("SET CHARACTER SET utf8");	//Gestion des accents
    }
//gestion des erreurs
catch(Exception $e)
    {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }


?>



<!-- PHP connexion database fonctionnel -->
<?php
/*
  
  // Server name must be localhost
  $servername = "localhost";
    
  // In my case, user name will be root
  $username = "root";
    
  // Password is empty
  $password = "";

  //DataBas name
  $database= "techlottery";
    
  // Creating a connection
  $conn = new mysqli($servername, 
              $username, $password, $database);
    
  // Check connection
  if ($conn->connect_error) {
      die("Connection failure: ". $conn->connect_error);
  } 
    
  $result = $conn->query("SELECT * FROM `user`");
 
foreach ($result as $row)
  print_r($row);

// Closing connection
  $conn->close();
*/

  ?>



