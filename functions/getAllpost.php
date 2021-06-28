<?php
require('./helper/db-connect.php');

$sql = "SELECT p.id,p.title,p.content,u.username,p.createdDate,c.catName 
FROM posts as p 
INNER JOIN categories as c ON p.idCategory = c.id 
INNER JOIN users as u ON u.id = p.idUser";

$result = pdo_connect_mysql() -> prepare($sql);

$result -> execute();

$results = $result -> fetchAll();


function getTag($id)
{
    $sql = "SELECT t.tagName FROM tags AS t INNER JOIN post_tag AS pt ON pt.idTag = t.id WHERE pt.idPost = $id";

    $result = pdo_connect_mysql() -> prepare($sql);

    $result -> execute();

    $results = $result -> fetchAll();

    return $results;
}