<?php

$currentPage = (int) ($_GET['page'] ?? 1 ) ;
$id = $_GET['id'];
if ($currentPage <= 0) {
    throw new Exception('Numéro de page invalide!');
}

$reponse = (int) pdo_connect_mysql()->query("SELECT COUNT(*) FROM posts AS p WHERE p.idCategory = $id")->fetch(PDO::FETCH_NUM)[0];

$perPage = 10;
$pages = ceil($reponse / $perPage);

if ($currentPage > $pages) {
    throw new Exception("Cette page n'existe pas!");
}

$offset = $perPage * ($currentPage - 1);
$result = pdo_connect_mysql() -> prepare("SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName,p.idCategory 
                            FROM posts as p 
                            INNER JOIN categories as c ON p.idCategory = c.id 
                            INNER JOIN users as u ON u.id = p.idUser 
                            WHERE p.idCategory = $id
                            ORDER BY createdDate DESC LIMIT $perPage 
                            OFFSET $offset");

$result -> execute();

$results = $result ->fetchAll();