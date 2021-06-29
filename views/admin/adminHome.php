<?php
session_start();
ob_start();

?>


<h1>Bienvenue <?php echo $_SESSION['username'] ?>sur l'espace membre !!!!</h1>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>