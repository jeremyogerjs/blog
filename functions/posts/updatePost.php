<?php
$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);
$createdDate = htmlspecialchars($_POST['createdDate']);
$idCategory = htmlspecialchars($_POST['idCategory']);
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$sql = "UPDATE posts SET
title         = :title,
content      = :content,
idUser     = :idUser,
createdDate   = :createdDate,
idCategory      = :idCategory
WHERE id = :id";


$result = pdo_connect_mysql() -> prepare($sql);

$results = $result ->execute(array(
    ':title'        => $title,
    ':idUser'       => 1,
    ':content'      => $content,
    ':createdDate'  => $createdDate,
    ':idCategory'   => $idCategory,
    ':id'           => $id
));

if($results)
{
    $msg = "La modification a été pris en compte !!!!";
    require('./views/forms/updateArticle.php');
}
else
{
    $msg = "Erreur lros de la modification, veuillez reesayer.Si le probleme persiste allez boire un café";
    require('./views/forms/updateArticle.php');
}