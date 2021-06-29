<?php

$id=$_GET['id'];
$bdd = pdo_connect_mysql();
$req = $bdd->prepare("SELECT p.title,p.content,p.createdDate,p.id,c.catName FROM posts AS p INNER JOIN categories AS c ON p.idCategory = c.id where p.id =?");
$req->execute(array($id)
);
$result = $req->fetch();