<?php
$currentPage = (int) ($_GET['page'] ?? 1);
$query = isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '';
if ($currentPage <= 0) {
    throw new Exception('Numéro de page invalide!');
}
$reponse = (int) pdo_connect_mysql()->query("SELECT COUNT(p.id) FROM posts AS p 
INNER JOIN categories AS c ON p.idCategory = c.id 
INNER JOIN users AS u ON u.id = p.idUser
INNER JOIN post_tag AS pt ON p.id = pt.idPost
INNER JOIN tags AS t ON pt.idTag = t.id
WHERE p.title LIKE '%$query%'
OR c.catName LIKE '%$query%'
OR t.tagName LIKE '%$query%'")->fetch(PDO::FETCH_NUM)[0];

$perPage = 6;
$pages = ceil($reponse / $perPage);

if ($currentPage > $pages) {
    throw new Exception("Cette page n'existe pas!");
}
$offset = $perPage * ($currentPage - 1);

$result = pdo_connect_mysql()->prepare("SELECT p.id,p.title,p.content,u.username,p.createdDate,c.catName, p.idCategory 
FROM posts as p 
INNER JOIN categories as c ON p.idCategory = c.id 
INNER JOIN users as u ON u.id = p.idUser 
INNER JOIN post_tag AS pt ON p.id = pt.idPost
INNER JOIN tags AS t ON pt.idTag = t.id
WHERE p.title LIKE ? 
OR c.catName LIKE ?
OR t.tagName LIKE ?  
LIMIT $perPage 
OFFSET $offset");

$result->execute(["%$query%", "%$query%", "%$query%"]);

$results = $result->fetchAll();

if (!$results) {
    header("Location:index.php?target=404&action=notFound");
}
