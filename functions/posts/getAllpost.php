<?php


$sql = "SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName
FROM posts as p   
INNER JOIN categories as c ON p.idCategory = c.id 
INNER JOIN users as u ON u.id = p.idUser";

$result = pdo_connect_mysql() -> prepare($sql);

$result -> execute();

$results = $result -> fetchAll();




