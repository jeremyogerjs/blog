<?php
function pdo_connect_mysql() {
  $username='root';
  $password="";
    
  try {

    $dbh = new PDO('mysql:host=localhost;dbname=blog', $username, $password);
    $dbh -> setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
    $dbh -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    
    return $dbh;
  }catch (PDOException $e) {
    print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
    return false;
    }
}