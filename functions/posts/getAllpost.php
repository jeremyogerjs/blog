<?php



// $sql = "SELECT COUNT(p.id), c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName
// FROM posts as p   
// INNER JOIN categories as c ON p.idCategory = c.id 
// INNER JOIN users as u ON u.id = p.idUser";

// $result = pdo_connect_mysql() -> prepare($sql);

// $result -> execute();

// $results = $result -> fetchAll();

$currentPage = (int) ($_GET['page'] ?? 1 ) ;

if ($currentPage <= 0) {
    throw new Exception('Numéro de page invalide!');
}

$reponse = (int) pdo_connect_mysql()->query("SELECT COUNT(id) FROM posts")->fetch(PDO::FETCH_NUM)[0];

$perPage = 2;
$pages = ceil($reponse / $perPage);

if ($currentPage > $pages) {
    throw new Exception("Cette page n'existe pas!");
}

$offset = $perPage * ($currentPage - 1);
$results = pdo_connect_mysql()->query("SELECT c.id,p.id,p.title,p.content,u.username,p.createdDate,c.catName FROM posts as p INNER JOIN categories as c ON p.idCategory = c.id 
                                        INNER JOIN users as u ON u.id = p.idUser ORDER BY createdDate DESC LIMIT $perPage OFFSET $offset");

