<?php 
session_start();
ob_start();

?>


<p>Liste des commentaires a valider !!!!</p>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>
