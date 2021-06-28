<?php
require('./helper/db-connect.php');

$sql='INSERT INTO commentaries (comment ,pseudo, idPosts) VALUES(?,?,?)';
$req = pdo_connect_mysql() -> prepare($sql);
$req->execute(array(
    'pseudo'=>$pseudo,
    'comment'=>$comment,
    'idPost'=>$idPost));
$req->closeCursor();

