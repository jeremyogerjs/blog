<?php
require('./helper/db-connect.php');

$sql='INSERT INTO commentaries (comment ,pseudo, idPosts) VALUES(?,?,?)'
$bdd =  pdo_connect_mysql($sql) ;
$req = $bdd->prepare();
$req->execute(array(
    'pseudo'=>$pseudo,
    'comment'=>$comment,
    'idPost'=>$idPost));
$req->closeCursor();

