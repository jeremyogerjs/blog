<?php
function pdo_connect_mysql() {
  $username='root';
  $password="";
    
  try {

    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);
    $dbh -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
    $dbh -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    echo "connexion établie" . "<br/>";
    return $dbh;
        
  
  }catch (PDOException $e) {
    print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
    return false;
    }
}