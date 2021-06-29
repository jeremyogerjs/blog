<?php



$id=$_GET['id'];
$bdd = pdo_connect_mysql();
$sql='INSERT INTO commentaries (comment ,pseudo, idPosts,validate) VALUES(?,?,?,?)';
$req = $bdd-> prepare($sql);
$req->execute(array(
    $_POST['comment'],
    $_POST['pseudo'],
    $id,
    0    ));
$req->closeCursor();
if ($req)
{
    $succes='votre commentaire est en cours de validation ';
    require ('./views/singlepost.php');
} 
else {
    $error = "votre commentaire n 'as pas etait pris en compte";
    require ('./views/singlepost.php');
}

