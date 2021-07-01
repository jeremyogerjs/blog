<?php

// $validate = 1 si le commentaire est validé sinon 0
function getComments($id,$validate)
{
    $sanitId = isset($id) ? htmlspecialchars($id) : '';
    $sql = "SELECT c.id,c.comment,c.validate,c.pseudo,c.idPosts FROM commentaries AS c WHERE c.idPosts = $sanitId AND c.validate = $validate ";

    $result = pdo_connect_mysql() ->prepare($sql);
    $result -> execute();
    $results = $result ->fetchAll();

    return $results;
}

function getAllComments($validate)
{
    $sql = "SELECT c.id,c.comment,c.validate,c.pseudo,c.idPosts,p.title,c.pseudo FROM commentaries AS c INNER JOIN posts AS p ON p.id = c.idPosts WHERE c.validate = $validate ";
    $result = pdo_connect_mysql() ->prepare($sql);
    $result -> execute();
    $results = $result ->fetchAll();

    return $results;
}

