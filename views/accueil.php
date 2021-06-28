<?php 
 session_start ();

ob_start(); 
// Demarrage pour chaque fichier views
?> 


<div>
<a href="index.php?action=admin">sign in</a>

    <p>Bienvenue <?php echo $_SESSION['username'] ?> Je suis l'accueil !!!!</p>

</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>