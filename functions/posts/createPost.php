<?php 

$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);
$createdDate = htmlspecialchars($_POST['createdDate']);
$idCategory = htmlspecialchars($_POST['idCategory']);
$idTag = htmlspecialchars($_POST['idTag']);

$sql = "INSERT INTO posts (
    title, 
    content, 
    idUser, 
    createdDate,
    idCategory)
VALUES (:title,:content,:idUser,:createdDate,:idCategory)";

$result = pdo_connect_mysql() -> prepare($sql);
$result -> execute(array(
    ':title' => $title,
    ':content' => $content,
    ':idUser' => 1,
    ':createdDate' => $createdDate,
    ':idCategory' => $idCategory
));

if($result){
    $sql1 = "INSERT INTO post_tag (
        idPost,
        idTag)
        VALUES ((SELECT MAX(id) FROM posts),:idTag)";
    $result1 = pdo_connect_mysql() -> prepare($sql1);  
 
    $result1 -> execute(array(
        ':idTag' => $idTag 
    ));
}

if($result)
{
    header("Location:index.php");
}
else
{
    $msg = "Erreur lors de la creation.Si le probleme persiste allez boire un café";
    require('./views/forms/createArticles.php');
}



