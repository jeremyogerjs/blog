<?php
require('./helper/db-connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE id = $id";

$result = pdo_connect_mysql() ->exec($sql);

if($result > 0)
{
    $msg = "La catégorie a bien été supprimer !!";
    require("./views/admin/adminCategories.php");
}
else
{
    $msg = "La catégorie n'a pas été supprimer,veuillez réessayer !!";
    require("./views/admin/adminCategories.php");
}