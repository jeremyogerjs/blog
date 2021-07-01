<?php
$id = is_numeric($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$bdd = pdo_connect_mysql();
$sql = "UPDATE commentaries set 
validate = 1
WHERE id = $id
";
$result = $bdd->prepare($sql);
$result->execute();
$result->fetch();

if ($result) {
    $succes = 'votre commentaire a été validé';
    require('./views/admin/adminComments.php');
} else {
    $error = 'votre commentaire n as pas etait validé';
}
