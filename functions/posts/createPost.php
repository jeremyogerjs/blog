<?php 

$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);
$createdDate = htmlspecialchars($_POST['createdDate']);
$idCategory = htmlspecialchars($_POST['idCategory']);
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
    $msg = "Erreur lors de la creation.Si le probleme persiste allez boire un café";
    require('./views/forms/createArticles.php');
}



