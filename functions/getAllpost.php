<?php
require('./helper/db-connect.php');

$sql = "SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName
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

// $validate = 1 si le commentaire est validé sinon 0
function getComments($id,$validate)
{
    $sql = "SELECT c.id,c.comment,c.validate,c.pseudo,c.idPosts FROM commentaries AS c WHERE c.idPosts = $id AND c.validate = $validate";

    $result = pdo_connect_mysql() ->prepare($sql);

    $result -> execute();
    $results = $result ->fetchAll();

    return $results;
}