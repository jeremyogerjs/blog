<?php

// $validate = 1 si le commentaire est validé sinon 0
function getComments($id,$validate)
{
    $sql = "SELECT c.id,c.comment,c.validate,c.pseudo,c.idPosts FROM commentaries AS c WHERE c.idPosts = $id AND c.validate = $validate";

    $result = pdo_connect_mysql() ->prepare($sql);

    $result -> execute();
    $results = $result ->fetchAll();

    return $results;
}