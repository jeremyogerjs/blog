<?php 

$title = $_POST['title'];
$content = $_POST['content'];
$createdDate = $_POST['createdDate'];
$idCategory = $_POST['idCategory'];
$sql = "INSERT INTO posts (
    title, 
    content, 
    idUser, 
    createdDate,
    idCategory)
VALUES (:title,:content,:idUser,:createdDate,:idCategory)";


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
    header("Location:index.php");
}
else
{
    $msg = "Erreur lros de la creation";
    require('./views/forms/createArticles.php');
}



