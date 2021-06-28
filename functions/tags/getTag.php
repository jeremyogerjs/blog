<?php

//recupere les tags asssocier au poste via l'id du post
function getTag($id)
{
    $sql = "SELECT t.tagName FROM tags AS t INNER JOIN post_tag AS pt ON pt.idTag = t.id WHERE pt.idPost = $id";

    $result = pdo_connect_mysql() -> prepare($sql);

    $result -> execute();

    $results = $result -> fetchAll();

    return $results;
}