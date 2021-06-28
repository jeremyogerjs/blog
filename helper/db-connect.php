<?php
function pdo_connect_mysql() {
  $username='root';
  $password="";
    
  try {
    $dbh = new PDO('mysql:host=localhost;dbname=blog', $username, $password);
    echo "connexion établie" . "<br/>";
    return $dbh;
        
  
  }catch (PDOException $e) {
    print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
    return false;
    }
}