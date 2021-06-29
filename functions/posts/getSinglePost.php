<?php

$id=$_GET['id'];
$bdd = pdo_connect_mysql();
$req = $bdd->prepare("SELECT title,content,createdDate,id FROM posts where id =?");
$req->execute(array($id)
);
$result = $req->fetch();