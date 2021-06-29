<?php
$title = $_POST['title'];
$content = $_POST['content'];
$createdDate = $_POST['createdDate'];
$idCategory = $_POST['idCategory'];
$id = $_GET['id'];
$sql = "UPDATE posts SET
title         = :title,
content      = :content,
idUser     = :idUser,
createdDate   = :createdDate,
idCategory      = :idCategory
WHERE id = $id";


$result = pdo_connect_mysql() -> prepare($sql);

$results = $result ->execute(array(
    ':title' => $title,
    ':idUser' => 1,
    ':content' => $content,
    ':createdDate' => $createdDate,
    ':idCategory' => $idCategory,
));

if($results)
{
    $msg = "La modification a été pris en compte !!!!";
    require('./views/forms/updateArticle.php');
}
else
{
    $msg = "Erreur lros de la creation";
    require('./views/forms/updateArticle.php');
}