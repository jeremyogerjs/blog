<?php
require('./helper/db-connect.php');

$bdd =  pdo_connect_mysql() ;
$req = $bdd->prepare(INSERT INTO commentaries (comment ,pseudo, idPosts) VALUES(?,?,?));
$req->execute(array($pseudo,$comment,$idPost));
$req->closeCursor();

