<?php
session_start();
ob_start(); // Demarrage pour chaque fichier views
?>

<p>Cette page que vous recherchez n'existe pas !!!!</p>
<button class="btn- btn-success"><a href="index.php" class="link-light text-decoration-none">Retour accueil</a></button>
 
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content
?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content
?>