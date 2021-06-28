<?php require("./helper/db-connect.php");
ob_start();
session_start();
?>


<h1>Bienvenue sur l'espace membre !!!!</h1>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>