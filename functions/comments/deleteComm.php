
<?php
$id = $_GET['id'];
$sql= "DELETE from commentaries WHERE id = $id";
$bdd = pdo_connect_mysql();
$result=$bdd->prepare($sql);
$result->execute();


if($result) {
    $succes= 'votre commentaire a été supprimé';
    require('./views/admin/adminComments.php');
}
