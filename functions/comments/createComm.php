<?php
$id = is_numeric($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$commentaire = htmlspecialchars($_POST['comment']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$bdd = pdo_connect_mysql();
$sql = 'INSERT INTO commentaries (comment ,pseudo, idPosts,validate) VALUES(?,?,?,?)';
$req = $bdd->prepare($sql);
$req->execute(array(
    $commentaire,
    $pseudo,
    $id,
    0
));
$req->closeCursor();
if ($req) {
    $sucess = 'votre commentaire est en cours de validation ';
    require('./views/singlepost.php');
} else {
    $error = "votre commentaire n 'as pas etait pris en compte";
    require('./views/singlepost.php');
}
