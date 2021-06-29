<?php
require('./helper/db-connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM tags WHERE id = $id";

$result = pdo_connect_mysql() -> exec($sql);


if($result > 0)
{
    $msg = "Le tag a bien été supprimer";
    require("./views/admin/adminTag.php");
}
else
{
    $msg = "Le tag n'a pas été supprimer,veuillew réessayer";
    require("./views/admin/adminTag.php");
}