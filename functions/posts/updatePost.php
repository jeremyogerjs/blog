<?php
$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);
$createdDate = htmlspecialchars($_POST['createdDate']);
$idCategory = htmlspecialchars($_POST['idCategory']);
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$idTag = htmlspecialchars($_POST['idTag']);
$sql = "UPDATE posts SET
title           = :title,
content         = :content,
idUser          = :idUser,
createdDate     = :createdDate,
idCategory      = :idCategory
WHERE id = :id";

$result = pdo_connect_mysql()->prepare($sql);
$result->execute(array(
    ':title'        => $title,
    ':idUser'       => 1,
    ':content'      => $content,
    ':createdDate'  => $createdDate,
    ':idCategory'   => $idCategory,
    ':id'           => $id
));
if ($result) {
    $sql1 = "UPDATE post_tag SET
        idTag   = :idTag
        WHERE idPost = :id";
    $result1 = pdo_connect_mysql()->prepare($sql1);

    $result1->execute(array(
        ':idTag'    => $idTag,
        ':id'       => $id
    ));
}
if ($result) {
    $msg = "La modification a été pris en compte !!!!";
    require('./views/forms/updateArticle.php');
} else {
    $msg = "Erreur lors de la modification, veuillez réessayer.Si le probleme persiste allez boire un café";
    require('./views/forms/updateArticle.php');
}
